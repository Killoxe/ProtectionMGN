<div class="calculate-osago-html">
    <div class="from">
        <strong>Заявка на ОСАГО от:</strong> <?= $data['surname'] ?> <?= $data['name'] ?> <?= $data['patronymic'] ?>
    </div>
    <div class="email">
        <strong>Почта:</strong> <?= $data['email'] ?>
    </div>
    <div class="phone">
        <strong>Телефон:</strong> <?= $data['phone'] ?>
    </div>

    <div class="people">
        <strong>Водители:</strong>
    </div>
    <ol class="people-list" style="padding-left: 10px">
    <?php foreach ($data['people'] as $i => $people): ?>
        <li class="people-<?= $i ?>">
            <div class="date-birth">
                <strong>Дата рождения:</strong> <?= $people['date_birth'] ?>
            </div>
            <div class="driver-license-series">
                <strong>Серия водительского удостоверения:</strong> <?= $people['driver_license_series'] ?>
            </div>
            <div class="driver-license-number">
                <strong>Номер водительского удостоверения:</strong> <?= $people['driver_license_number'] ?>
            </div>
            <div class="date-begin-experience">
                <strong>Дата начала стажа:</strong> <?= $people['date_begin_experience'] ?>
            </div>
        </li>
    <?php endforeach; ?>
    </ol>

    <div class="date-end-insurance-policy">
        <strong>Дата окончания страхового полиса ОСАГО:</strong> <?= $data['date_end_insurance_policy'] ? $data['date_end_insurance_policy'] : '-' ?>
    </div>
    <div class="horse-power">
        <strong>Лошадиные силы:</strong> <?= $data['horse_power'] ?>
    </div>
    <div class="registration">
        <strong>Прописа:</strong> <?= $data['registration'] ?>
    </div>
</div>
