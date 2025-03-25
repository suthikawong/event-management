function onSubmitForm(e) {
  $('.submit-button').attr('disabled', 'disabled')
  e.preventDefault()
  const formData = new FormData($('#login-form')[0])
  $.ajax({
    url: 'includes/login.inc.php?action=login',
    type: 'POST',
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function (response) {
      const res = JSON.parse(response)
      if (res.statusCode === 200) {
        if (res.user['is_admin']) {
          window.location.href = `${publicPath}/event-management`
        } else {
          window.location.href = `${publicPath}/home`
        }
      } else {
        $('#error-message').text(res.message)
        $('#error-message').show()
        $('.submit-button').removeAttr('disabled')
      }
    },
  })
}

function onClickSignupLink() {
  window.location.href = `${publicPath}/signup`
}

$(document).ready(function () {
  $('#error-message').hide()
  $('#login-form').on('submit', (e) => onSubmitForm(e))
  $('.signup-text > a').click(onClickSignupLink)
})
