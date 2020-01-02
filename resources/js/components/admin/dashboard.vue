<template>
<div>
  <CRow>
    <CCol col="12" sm="3">
      <CWidgetIcon
        header="₹1,999"
        text="Income"
        color="primary">
        <CIcon name="cil-speedometer"/>
      </CWidgetIcon>
    </CCol>

    <CCol col="12" sm="3">
      <CWidgetIcon
        header="₹999.50"
        text="Expanses"
        color="danger">
        <CIcon name="cil-money"/>
      </CWidgetIcon>
    </CCol>

     <CCol col="12" sm="3">
      <CWidgetIcon
        header="125"
        text="Online Users"
        color="success">
        <CIcon name="cil-people"/>
      </CWidgetIcon>
    </CCol>

    <CCol col="12" sm="3">
      <CWidgetIcon
        header="2000"
        text="Total Users"
        color="dark">
        <CIcon name="cil-user-follow"/>
      </CWidgetIcon>
    </CCol>
  </CRow>

<h1 class="text-center">Users Activity</h1>
<CRow>
  <CCol>
    <UserTable />
  </CCol>
  <CCol>
    <ChartWidget />
    <QuickNotify />
  </CCol>
</CRow>
    
</div>
</template>

<script>
import UserTable from './common/widget1';
import ChartWidget from './common/widget2';
import QuickNotify from './common/widget3';

export default {
    name: 'App',
    components:{
      UserTable,
      ChartWidget,
      QuickNotify
    }
}
</script>
