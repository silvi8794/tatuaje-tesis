$('form.form-signin button.btn-access').on('click', e => {
    let email = $('form.form-signin input#email').val().trim(),
        password = $('form.form-signin input#password').val().trim()
    e.preventDefault()
    e.stopPropagation()

        $('.box-login-form').hide()
        $('.progressbar').show()
        loadProgress(10)

})
let loadProgress = timeProgressMS => {
    let current_progress = 0,
        max_time = 100,
        refreshIntervalId = setInterval(() => {
            current_progress += timeProgressMS
            $('.progressbar #progress')
                .css("width", current_progress + "%")
                .attr("aria-valuenow", current_progress)
            if (current_progress >= max_time) {
                $('form.form-signin').submit()
                clearInterval(refreshIntervalId)
            }
        }, 100)
}