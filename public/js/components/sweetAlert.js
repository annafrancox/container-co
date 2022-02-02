$('.form-delete').on('submit', function (event) {
    event.preventDefault();

    form = $(this);

    Swal.fire({
        title: 'Deseja mesmo deletar esse registro?',
        text: 'Não será possível reverter essa ação! Todos os registros associados a este também serão deletados.',
        icon: 'warning',
        confirmButtonColor: '#d33',
        confirmButtonText: 'Deletar',

        showCancelButton: true,
        cancelButtonColor: '#777777',
        cancelButtonText: 'Cancelar',

        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            form.unbind(event);
            form.addClass('ajaxWatch');
            form.submit();
        }
    });
});
