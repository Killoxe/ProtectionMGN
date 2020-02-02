var $calculateOsagoForm = $('body').find('#calculate-osago-form');

$calculateOsagoForm.on('beforeValidate', function () {
    var $listEditItems = $('.calculateosagoform-people-list-edit .list-edit__item');

    $listEditItems.each(function (i, el) {
        var $el = $(el),
            $dateBirthInput = $el.find('.calculateosagoform-people-date_birth-input'),
            $driverLicenseSeriesInput = $el.find('.calculateosagoform-driver_license_series-input'),
            $driverLicenseNumberInput = $el.find('.calculateosagoform-driver_license_number-input'),
            $dateBeginExperienceInput = $el.find('.calculateosagoform-date_begin_experience-input');

        if (!$dateBirthInput.val()) {
            $dateBirthInput.parent().parent().addClass('has-error');/*.find('.help-block').text('Необходимо заполнить "Дата рождения"');*/
        } else {
            $dateBirthInput.parent().parent().removeClass('has-error');/*.find('.help-block').text('');*/
        }

        if (!$driverLicenseSeriesInput.val()) {
            $driverLicenseSeriesInput.parent().addClass('has-error');
        } else {
            $driverLicenseSeriesInput.parent().removeClass('has-error');
        }

        if (!$driverLicenseNumberInput.val()) {
            $driverLicenseNumberInput.parent().addClass('has-error');
        } else {
            $driverLicenseNumberInput.parent().removeClass('has-error');
        }

        if (!$dateBeginExperienceInput.val()) {
            $dateBeginExperienceInput.parent().parent().addClass('has-error');
        } else {
            $dateBeginExperienceInput.parent().parent().removeClass('has-error');
        }
    });
});
