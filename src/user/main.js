$(document).ready(function() {
  $("#tabstrip").kendoTabStrip({
    animation: {
      open: {
        effects: "fadeIn"
      }
    }
  });
  
  
      var required = $("#Credentials").kendoMultiSelect({autoClose: false}).data("kendoMultiSelect");
              $("#MedicalLicenses").kendoGrid({
                  dataSource: [{State:"Florida", StateLicense:"ASDASD123", StateExpiration:"12/12/2021", DEANumber:"ADSASDAS123", DEAExpiration:"12/12/2020", OrderLevel:"Level II"}, {State:"Arkansas", StateLicense:"TEWWQE176", StateExpiration:"09/06/2021", DEANumber:"MBNNNF777", DEAExpiration:"02/02/2020", OrderLevel:"Level II"}],
                  pageable: true,
                  height: 200,
                  toolbar: ["create"],
                  columns: [
                      { field: "State", title: "State", width: "120px" },
                      { field: "StateLicense", title:"State License", width: "120px" },
                      { field: "StateExpiration", title:"State Expiration", width: "120px" },
                      { field: "DEANumber",  title:"DEA Number", width: "120px" },                       
                      { field: "DEAExpiration", title:"DEA Expiration", width: "120px" },                         
                      { field: "OrderLevel", title:"Order Level", width: "120px" },
                      { command: ["edit", "destroy"], title: "&nbsp;", width: "250px" }],
                  editable: "inline"
              });
  
});
angular.module("KendoDemos", ["kendo.directives"])
  .controller("MyCtrl", function($scope) {
    $scope.getType = function(x) {
      return typeof x;
    };
    $scope.IntegratedAuth = true;
    $scope.isDate = function(x) {
      return x instanceof Date;
    };
  })