<template>
  <!-- <CDataTable
    :items="items"
    :fields="fields"
    column-filter
    table-filter
    items-per-page-select
    hover
    sorter
    pagination
  > -->
  <CDataTable
    :items="items"
    :fields="fields"
    table-filter
    items-per-page-select
    hover
    sorter
    pagination
    itemsPerPage="5"
  >
    <template #status="{item}">
      <td>
        <CBadge :color="getBadge(item.active)">
          {{ (item.active == 1)? 'Active' : 'Inactive'}}
        </CBadge>
      </td>
    </template>
    <template #show_details="{item, index}">
      <td class="py-2">
        <CButton
          color="primary"
          variant="outline"
          square
          size="sm"
          @click="toggleDetails(index)"
        >
          {{details.includes(index) ? 'Hide' : 'Show'}}
        </CButton>
      </td>
    </template>
    <template #details="{item, index}">
      <CCollapse :show="details.includes(index)">
        <CCardBody>
          <table class="table">
            <tr>
              <th>email:</th>
              <th>WhatsApp:</th>
              <th>JoinAt:</th>
              <th>Details:</th>
            </tr>
            <tr>
              <td>{{item.email}}</td>
              <td>{{item.whatsapp}}</td>
              <td>{{item.join}}</td>
              <td><a class="btn btn-outline-success btn-sm" :href="'/admin/user/view/'+item.id" target="blank">View Details</a></td>
            </tr>
          </table>
        </CCardBody>
      </CCollapse>
    </template>
  </CDataTable>
</template>

<script>
// const fields = [
//   { key: 'username', _style:'width:40%' },
//   'registered',
//   { key: 'role', _style:'width:20%;' },
//   { key: 'status', _style:'width:20%;' },
//   { 
//     key: 'show_details', 
//     label: 'Actions', 
//     _style: 'width:1%', 
//     sorter: false, 
//     filter: false
//   }
// ]

// const items = [];
// const items = [
//   { username: 'Samppa Nori', registered: '2012/01/01', role: 'Member', status: 'Active'},
//   { username: 'Estavan Lykos', registered: '2012/02/01', role: 'Staff', status: 'Banned'},
//   { username: 'Chetan Mohamed', registered: '2012/02/01', role: 'Admin', status: 'Inactive'},
//   { username: 'Derick Maximinus', registered: '2012/03/01', role: 'Member', status: 'Pending'},
//   { username: 'Friderik Dávid', registered: '2012/01/21', role: 'Staff', status: 'Active'},
//   { username: 'Yiorgos Avraamu', registered: '2012/01/01', role: 'Member', status: 'Active'},
//   { username: 'Avram Tarasios', registered: '2012/02/01', role: 'Staff', status: 'Banned', _classes: 'table-success'},
//   { username: 'Quintin Ed', registered: '2012/02/01', role: 'Admin', status: 'Inactive'},
//   { username: 'Enéas Kwadwo', registered: '2012/03/01', role: 'Member', status: 'Pending'},
//   { username: 'Agapetus Tadeáš', registered: '2012/01/21', role: 'Staff', status: 'Active'},
//   { username: 'Carwyn Fachtna', registered: '2012/01/01', role: 'Member', status: 'Active', _classes: 'table-info'},
//   { username: 'Nehemiah Tatius', registered: '2012/02/01', role: 'Staff', status: 'Banned'},
//   { username: 'Ebbe Gemariah', registered: '2012/02/01', role: 'Admin', status: 'Inactive'},
//   { username: 'Eustorgios Amulius', registered: '2012/03/01', role: 'Member', status: 'Pending'},
//   { username: 'Leopold Gáspár', registered: '2012/01/21', role: 'Staff', status: 'Active'},
//   { username: 'Pompeius René', registered: '2012/01/01', role: 'Member', status: 'Active'},
//   { username: 'Paĉjo Jadon', registered: '2012/02/01', role: 'Staff', status: 'Banned'},
//   { username: 'Micheal Mercurius', registered: '2012/02/01', role: 'Admin', status: 'Inactive'},
//   { username: 'Ganesha Dubhghall', registered: '2012/03/01', role: 'Member', status: 'Pending'},
//   { username: 'Hiroto Šimun', registered: '2012/01/21', role: 'Staff', status: 'Active'},
//   { username: 'Vishnu Serghei', registered: '2012/01/01', role: 'Member', status: 'Active'},
//   { username: 'Zbyněk Phoibos', registered: '2012/02/01', role: 'Staff', status: 'Banned'},
//   { username: 'Einar Randall', registered: '2012/02/01', role: 'Admin', status: 'Inactive', _classes: 'table-danger'},
//   { username: 'Félix Troels', registered: '2012/03/21', role: 'Staff', status: 'Active'},
//   { username: 'Aulus Agmundr', registered: '2012/01/01', role: 'Member', status: 'Pending'}
// ]

export default {
  name: 'UserTable',
  data () {
    return {
      items: [],
      fields: [],
      details: []
    }
  },
  async mounted(){
    const users = await axios.get('/admin/api/users');
    this.fields = [
        { key: 'name'},
        { key: 'mobile' },
        { key: 'utype', label:'Role' },
        { key: 'status',  _style:'width:20%;' },
        { key: 'show_details', label:'Actions' }
      ];

    this.items = users.data.map((res)=> {
      return {
        id: res.id,
        name: res.fname +' '+res.lname,
        email: res.email,
        mobile: res.mobile,
        whatsapp: res.whatsapp,
        utype: res.user_type,
        join: res.created_at.split(" ")[0],
        active: res.active,
      }
    });
    console.log(this.items);

  },
  methods: {
    getBadge (status) {
      return status === 1 ? 'success'
             : status === 0 ? 'secondary'
             : status === 'Pending' ? 'warning'
             : status === 'Banned' ? 'danger' : 'primary'
    },
    toggleDetails (index) {
      const position = this.details.indexOf(index)
      position !== -1 ? this.details.splice(position, 1) : this.details.push(index)
    }
  }
}
</script>