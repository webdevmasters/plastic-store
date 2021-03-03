$(document).ready(function () {
    $('input.typeahead').typeahead({
        source: function (search, process) {
            return $.get("autocomplete", {search: search}, function (data) {
                return process(data);
            });
        },
        afterSelect: function (item) {
            document.getElementById("search").value = item.name;
            document.getElementById('searchForm').submit();
        }
    });
});
