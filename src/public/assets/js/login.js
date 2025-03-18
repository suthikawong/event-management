const onSubmitForm = (e) => {
  $('.submit-button').attr('disabled', 'disabled')
  e.preventDefault()
  const formData = new FormData($('#login-form')[0])
  $.ajax({
    url: 'login.inc.php?action=login',
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

const onClickSignupLink = () => {
  window.location.href = '../public/signup'
}

$(document).ready(function (e) {
  $('#error-message').hide()
  $('#login-form').on('submit', (e) => onSubmitForm(e))
  $('.signup-text > a').click(onClickSignupLink)
})
