/*=========================================================================================
    File Name: datatables-basic.js
    Description: Basic Datatable
    ----------------------------------------------------------------------------------------
    Item Name: Frest HTML Admin Template
    Version: 1.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(document).ready(function () {

    if ($(".invoice-data-table").length) {
        var dataListView = $(".invoice-data-table").DataTable({
            columnDefs: [
                {
                    targets: 0,
                    className: "control"
                },

                {
                    targets: [0, 1, 2],
                    orderable: false
                },
            ],
            order: [2, 'desc'],
            dom:
                '<"top d-flex flex-wrap"<"action-filters flex-grow-1"f><"actions action-btns d-flex align-items-center">><"clear">rt<"bottom"p>',
            language: {
                search: "",
                searchPlaceholder: "Поиск"
            },
            select: {
                style: "multi",
                selector: "td:first-child",
                items: "row"
            },
            responsive: {
                details: {
                    type: "column",
                    target: 0
                }
            }
        });
    }

    /****************************************
     *       js of zero configuration        *
     ****************************************/

    //$('.zero-configuration').DataTable();

    /********************************************
     *        js of Order by the grouping        *
     ********************************************/

    var groupingTable = $('.zero-configuration').DataTable({
        "columnDefs": [{
            "visible": true,
            "targets": 2
        }],
        "order": [
            [0, 'desc']
        ],

    });

    $('.row-grouping tbody').on('click', 'tr.group', function () {
        var currentOrder = groupingTable.order()[0];
        if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
            groupingTable.order([2, 'desc']).draw();
        } else {
            groupingTable.order([2, 'asc']).draw();
        }
    });

    /*************************************
     *       js of complex headers        *
     *************************************/

    $('.complex-headers').DataTable();


    /*****************************
     *       js of Add Row        *
     ******************************/

    var t = $('.add-rows').DataTable();
    var counter = 2;

    $('#addRow').on('click', function () {
        t.row.add([
            counter + '.1',
            counter + '.2',
            counter + '.3',
            counter + '.4',
            counter + '.5'
        ]).draw(false);

        counter++;
    });


    /**************************************************************
     * js of Tab for COLUMN SELECTORS WITH EXPORT AND PRINT OPTIONS *
     ***************************************************************/

    $('.dataex-html5-selectors').DataTable({
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [0, ':visible']
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                text: 'JSON',
                action: function (e, dt, button, config) {
                    var data = dt.buttons.exportData();

                    $.fn.dataTable.fileSave(
                        new Blob([JSON.stringify(data)]),
                        'Export.json'
                    );
                }
            },
            {
                extend: 'print',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ]
    });

    /**************************************************
     *       js of scroll horizontal & vertical        *
     **************************************************/

    $('.scroll-horizontal-vertical').DataTable({
        "scrollY": 200,
        "scrollX": true
    });
});
