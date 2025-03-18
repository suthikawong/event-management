const onSubmitForm = (e) => {
  $('.submit-button').attr('disabled', 'disabled')
  e.preventDefault()
  const formData = new FormData($('#signup-form')[0])
  $.ajax({
    url: 'signup.inc.php?action=insertData',
    type: 'POST',
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      const res = JSON.parse(response)
      if (res.statusCode === 200) {
        window.location.href = '../public/home'
      } else {
        $('#error-message').text(res.message)
        $('#error-message').show()
        $('.submit-button').removeAttr('disabled')
      }
    },
  })
}

$(document).ready(function (e) {
  $('#error-message').hide()
  $('#signup-form').on('submit', (e) => onSubmitForm(e))
})
