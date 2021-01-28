$('#userModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var name = button.data('name');
    var email = button.data('email');
    var created = button.data('created');
    var modal = $(this);

    console.log("id: " + id);

    modal.find('.modal-body #user_id').text(id);
    modal.find('.modal-body #user_name').text(name);
    modal.find('.modal-body #user_email').text(email);
    modal.find('.modal-body #user_created').text(created);
});
