<script>
    function confirmDelete(url, message = 'Вы уверены, что хотите удалить запись?') {
        $.confirm({
            title: 'Подтвердите действие',
            content: message,
            buttons: {
                да: function () {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        dataType: 'json',
                        data: {method: '_DELETE', submit: true, _token: "{{ csrf_token() }}",},
                    }).always(function (data) {
                        $('#data-table').DataTable().draw(false);
                    });
                },
                отмена: function () {
                    $.alert('Отменено');
                },
            }
        });
    }
</script>
