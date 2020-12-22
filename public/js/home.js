document.addEventListener("DOMContentLoaded", (event) => {
    var table = new Tabulator("#example-table", {
        data:tabledata,           //load row data from array
        layout:"fitColumns", //fitDataFill",      // fitColumns : fit columns to width of table
        // responsiveLayout:"collapse",  //hide columns that dont fit on the table
        tooltips:true,            //show tool tips on cells
        pagination:"local",       //paginate the data
        paginationSize:10,         //allow 7 rows per page of data
        movableColumns:true,      //allow column order to be changed
        // responsiveLayoutCollapseStartOpen:false,
        initialSort:[             //set the initial sort order of the data
            {column:"code", dir:"asc"},
        ],
        columns:[                 //define the table columns
            // {formatter:"responsiveCollapse", width:30, minWidth:30, hozAlign:"center", resizable:false, headerSort:false},
            {title:"Code réseau", field:"code", formatter:"html"},
            {title:"Agence", field:"agence"},
            {title:"DR OFB", field:"dr"},
            {title:"Code entité Hydro", field:"hydro"},
            {title:"Toponyme Sandre", field:"toponyme"},
            {title:"Commune", field:"commune"}
        ],
    });
});