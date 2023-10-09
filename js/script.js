$(document).ready(function() {
    var table = $('#myG').DataTable( {
        "lengthMenu": [
            [25, 50, 150, 300, -1],
            [25, 50, 150, 300, "ทั้งหมด"]
        ],
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true,
        language: {
            search: "ใส่เลขประจำตัว  หรือชื่อนักเรียน ที่ต้องการค้นหา",
            searchPlaceholder: "ค้นหา",
        }
    } );
} );
$(document).ready(function() {
    var table = $('#myR1').DataTable( {
        "lengthMenu": [
            [25, 50, 150, 300, -1],
            [25, 50, 150, 300, "ทั้งหมด"]
            // [150, 25, 50, -1],
            // [150, 25, 50, "ทั้งหมด"]
        ],
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: false,
        language: {
            search: "ใส่เลขประจำตัว  หรือชื่อนักเรียน ที่ต้องการค้นหา",
            searchPlaceholder: "ค้นหา",
        }
    } );
} );