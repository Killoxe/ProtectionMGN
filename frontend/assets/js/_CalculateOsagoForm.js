var $form = $('#calculate-osago-form'),
    allowSubmit;

$form.on('beforeValidate', function () {
    var $listEditItems = $('.calculateosagoform-people-list-edit .list-edit__item');

    $listEditItems.each(function (i, el) {
        var $el = $(el),
            $dateBirthInput = $el.find('.calculateosagoform-people-date_birth-input'),
            $driverLicenseSeriesInput = $el.find('.calculateosagoform-driver_license_series-input'),
            $driverLicenseNumberInput = $el.find('.calculateosagoform-driver_license_number-input'),
            $dateBeginExperienceInput = $el.find('.calculateosagoform-date_begin_experience-input');

        if (!$dateBirthInput.val()) {
            $dateBirthInput.parent().parent().addClass('has-error').find('.help-block').text('Необходимо заполнить "Дата рождения"');
        } else {
            $dateBirthInput.parent().parent().removeClass('has-error').find('.help-block').text('');
        }

        if (!$driverLicenseSeriesInput.val()) {
            $driverLicenseSeriesInput.parent().addClass('has-error').find('.help-block').text('Необходимо заполнить "Серия водительского удостоверения"');
        } else {
            $driverLicenseSeriesInput.parent().removeClass('has-error').find('.help-block').text('');
        }

        if (!$driverLicenseNumberInput.val()) {
            $driverLicenseNumberInput.parent().addClass('has-error').find('.help-block').text('Необходимо заполнить "Номер водительского удостоверения"');
        } else {
            $driverLicenseNumberInput.parent().removeClass('has-error').find('.help-block').text('');
        }

        if (!$dateBeginExperienceInput.val()) {
            $dateBeginExperienceInput.parent().parent().addClass('has-error').find('.help-block').text('Необходимо заполнить "Дата начала стажа"');
        } else {
            $dateBeginExperienceInput.parent().parent().removeClass('has-error').find('.help-block').text('');
        }
    });

    allowSubmit = !$listEditItems.find('.has-error').length;
});

$form.on('beforeSubmit', function () {
    return allowSubmit;
});