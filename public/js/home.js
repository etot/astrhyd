document.addEventListener("DOMContentLoaded", (event) => {
    var table = new Tabulator("#sites-table", {
        data:tabledata,           //load row data from array
        layout:"fitColumns",      // fitColumns : fit columns to width of table
        tooltips:true,            //show tool tips on cells
        pagination:"local",       //paginate the data
        paginationSize:10,        //allow 7 rows per page of data
        movableColumns:true,      //allow column order to be changed
        initialSort:[             //set the initial sort order of the data
            {column:"code", dir:"asc"},
        ],
        columns:[                 //define the table columns
            {title:"Code réseau", field:"code", formatter:"html"},
            {title:"Agence", field:"agence"},
            {title:"DR OFB", field:"dr"},
            {title:"Code entité Hydro", field:"hydro"},
            {title:"Toponyme Sandre", field:"toponyme"},
            {title:"Commune", field:"commune"}
        ],
    });
});