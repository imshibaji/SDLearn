<template>
<div>
<div class="py-3">
<CTabs variant="tabs">
    <CTab title="Home" active>
       <table class="table">
            <tr>
                <th>Name</th>
                <th>Activity</th>
                <th>Message</th>
            </tr>
            <tr v-for="data in datas" :key="data.name">
                <td>
                    {{data.name}}
                </td>
                <td>
                    {{data.activity}}
                </td>
                <td>
                    {{data.message}}
                </td>
            </tr>
        </table>
    </CTab>

    <CTab title="Comments" >
      2. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
      et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
      aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
      dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
      officia deserunt mollit anim id est laborum.
    </CTab>

    <CTab title="Feedbacks" >
      2. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
      et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
      aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
      dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
      officia deserunt mollit anim id est laborum.
    </CTab>
  </CTabs>
       
    </div>
</div> 
</template>

<script>

export default {
    name: 'QuickNotify',
    data: function(){
        return{
            datas:[
                {name: 'Shibaji', activity: 'User Created', message:'Welcome User'},
                {name: 'Riya', activity: 'Emaild', message: 'Hello All Users'},
                {name: 'Shibaji', activity: 'User Created', message:'Welcome User'},
                {name: 'Riya', activity: 'Emaild', message: 'Hello All Users'}
            ]
        }
    }
}
</script>