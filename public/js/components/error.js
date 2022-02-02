$(document).ready(function () {
  for (var prop in errors) {
    ApplyError(prop, errors[prop][0]);
  }
});

window.ApplyError = function(field_name, field_error){
  for (var prop in errors) {
    var $el = $('*[name="' + prop + '"]').first();
    //console.log(errors[prop]);
    $el.addClass('is-invalid popover-dismiss');
    //$el.after('<span class="text-danger" role="alert"><small>' + errors[prop][0] + '</small></span>');
    $el.attr('data-placement', "top");
    $el.attr('data-trigger', "focus");
    $el.attr('data-toggle', "popover");
    $el.attr('data-content', errors[prop][0]);
    $el.popover("show");

    $el.on('change', function () {
      $el.removeClass('is-invalid');
      $el.next('span.text-danger').remove();
    });
  }
}
