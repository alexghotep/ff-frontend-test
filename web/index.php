<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>project title</title>
    <meta name="title" content="project title"/>
    <meta name="keywords" content="project title"/>
    <meta name="description" content="project title"/>
    <!-- в роботс.тхт закрыто всё. открой когда надо и удали этот коментарий -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
          rel="stylesheet">
    <link href="css/app.min.css" media="all" rel="stylesheet"/>
</head>
<body>
<?php $listItems = [
    [
        'listItemIcon' => 'icons-logo-f.svg',
        'listItemName' => 'FRHC.US',
        'listItemLongShort' => 'long',
        'listItemTpSlTsl' => 'tp',
        'listItemIsRingIcon' => false,
        'listItemValue' => '51.80',
        'listItemValueTrend' => 'positive',
        'listItemExchangeTitle' => 'NASDAQ | FREEDOM HOLDING CORP-NV',
        'listItemPercent1' => '00.00',
        'listItemPercent2' => '0.00%',
        'listItemPercentTrend' => 'static',
    ],
    [
        'listItemName' => 'WKHS.US',
        'listItemLongShort' => 'short',
        'listItemTpSlTsl' => 'sl',
        'listItemIsRingIcon' => false,
        'listItemValue' => '38.80',
        'listItemValueTrend' => 'negative',
        'listItemExchangeTitle' => 'NASDAQ | WORKHORSE GROUP INC',
        'listItemPercent1' => '-00.00',
        'listItemPercent2' => '-0.00%',
        'listItemPercentTrend' => 'negative',
    ],
    [
        'listItemName' => 'FIPO.SPB',
        'listItemIsRingIcon' => false,
        'listItemValue' => '42.54',
        'listItemValueTrend' => 'static',
        'listItemExchangeTitle' => 'NASDAQ | WORKHORSE GROUP INC',
        'listItemPercent1' => '00.00',
        'listItemPercent2' => '0.00%',
        'listItemPercentTrend' => 'positive',
    ],
]; ?>
<header class="header"></header>
<main class="main">
    <div class="fake-phone">
        <div class="fake-phone__header">
            <img src="images/phone-nav-bar.png" alt="phone bar top"/>
        </div>
        <div class="fake-phone__body">
            <div class="fake-phone__body_menu">
                <div class="fake-phone__body_menu--back">
                    <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.1387 5.40894C9.88281 5.40894 9.62665 5.50836 9.43165 5.70386L3.7754 11.3601C3.3844 11.7511 3.3844 12.3842 3.7754 12.7742L9.43165 18.4304C9.82265 18.8214 10.4557 18.8214 10.8457 18.4304L10.9316 18.3445C11.3226 17.9535 11.3226 17.3204 10.9316 16.9304L7.06837 13.0671H20.1387C20.6907 13.0671 21.1387 12.6191 21.1387 12.0671C21.1387 11.5151 20.6907 11.0671 20.1387 11.0671H7.06837L10.9316 7.20386C11.3226 6.81286 11.3226 6.1798 10.9316 5.78979L10.8457 5.70386C10.6502 5.50836 10.3946 5.40894 10.1387 5.40894L10.1387 5.40894Z"
                              fill="#007AFF"/>
                    </svg>
                </div>
                <div class="fake-phone__body_menu--text">
                    Мои списки
                </div>
                <div class="fake-phone__body_menu--icon">
                    <button>
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.1387 11.0671H13.1387V4.06714C13.1387 3.51514 12.6907 3.06714 12.1387 3.06714C11.5867 3.06714 11.1387 3.51514 11.1387 4.06714V11.0671H4.13867C3.58667 11.0671 3.13867 11.5151 3.13867 12.0671C3.13867 12.6191 3.58667 13.0671 4.13867 13.0671H11.1387V20.0671C11.1387 20.6191 11.5867 21.0671 12.1387 21.0671C12.6907 21.0671 13.1387 20.6191 13.1387 20.0671V13.0671H20.1387C20.6907 13.0671 21.1387 12.6191 21.1387 12.0671C21.1387 11.5151 20.6907 11.0671 20.1387 11.0671V11.0671Z"
                                  fill="#3B82F6"/>
                        </svg>
                    </button>
                    <button class="hidden">
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.7564 4.06708C17.1467 4.06708 16.537 4.29926 16.0716 4.76469L15.0844 5.75188L18.454 9.12148L19.4412 8.13429C20.3712 7.20428 20.3712 5.69554 19.4412 4.76469C18.9757 4.29926 18.3661 4.06708 17.7564 4.06708H17.7564ZM13.8208 7.01548L5.81798 15.0183C5.81798 15.0183 6.66459 15.0225 7.08158 15.4395C7.49857 15.8565 7.48962 16.6899 7.48962 16.6899C7.48962 16.6899 8.34855 16.7064 8.76638 17.1243C9.18421 17.5421 9.18758 18.3879 9.18758 18.3879L17.1904 10.3851L13.8208 7.01548ZM4.69752 16.7031L4.1447 19.6548C4.10005 19.8957 4.31017 20.1058 4.55109 20.0612L7.50278 19.5083L4.69752 16.7031Z"
                                  fill="#3B82F6"/>
                        </svg>
                    </button>
                    <button>
                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.1387 3.06714C11.0341 3.06714 10.1387 3.96257 10.1387 5.06714C10.1387 6.17171 11.0341 7.06714 12.1387 7.06714C13.2432 7.06714 14.1387 6.17171 14.1387 5.06714C14.1387 3.96257 13.2432 3.06714 12.1387 3.06714V3.06714ZM12.1387 10.0671C11.0341 10.0671 10.1387 10.9626 10.1387 12.0671C10.1387 13.1717 11.0341 14.0671 12.1387 14.0671C13.2432 14.0671 14.1387 13.1717 14.1387 12.0671C14.1387 10.9626 13.2432 10.0671 12.1387 10.0671ZM12.1387 17.0671C11.0341 17.0671 10.1387 17.9626 10.1387 19.0671C10.1387 20.1717 11.0341 21.0671 12.1387 21.0671C13.2432 21.0671 14.1387 20.1717 14.1387 19.0671C14.1387 17.9626 13.2432 17.0671 12.1387 17.0671Z"
                                  fill="#3B82F6"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="fake-phone__body_subheader">
                <h1>Избранное</h1>
            </div>
            <div class="fake-phone__body_list">
                <?php foreach ($listItems as $listItem) { ?>
                    <div class="list-item">
                        <div class="list-item__line list-item__line_top">
                            <div class="list-item__line_top--left">
                                <?php if (isset($listItem['listItemIcon'])) { ?>
                                    <img src="images/icons-logo-f.svg" alt="F"/>
                                <?php } ?>
                                <span class="list-item__exchange-name"><?= $listItem['listItemName']; ?></span>
                                <?php if (isset($listItem['listItemLongShort'])) { ?>
                                    <span class="list-item__exchange-term<?php if ($listItem['listItemLongShort'] == 'long') { ?> list-item__exchange-term_blue<?php } ?><?php if ($listItem['listItemLongShort'] == 'short') { ?> list-item__exchange-term_red<?php } ?>"><?= $listItem['listItemLongShort']; ?></span>
                                <?php } ?>
                                <?php if (isset($listItem['listItemTpSlTsl'])) { ?>
                                    <span class="list-item__tpsltsl<?php if ($listItem['listItemTpSlTsl'] == 'tp') { ?> list-item__tpsltsl_green<?php } ?><?php if ($listItem['listItemTpSlTsl'] == 'sl') { ?> list-item__tpsltsl_red<?php } ?>"><?= $listItem['listItemTpSlTsl']; ?></span>
                                <?php } ?>
                            </div>
                            <div class="list-item__line_top--right">
                                <span class="list-item__value <?php if ($listItem['listItemValueTrend'] == 'positive') { ?> list-item__value_positive<?php } ?> <?php if ($listItem['listItemValueTrend'] == 'negative') { ?> list-item__value_negative<?php } ?><?php if ($listItem['listItemValueTrend'] == 'static') { ?> list-item__value_static<?php } ?>"><?= $listItem['listItemValue']; ?></span>
                            </div>
                        </div>
                        <div class="list-item__line list-item__line_bottom">
                            <div class="list-item__line_bottom--left"></div>
                            <div class="list-item__line_bottom--right"></div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="fake-phone__footer">
            <img src="images/phone-menu-bar.png" alt="phone menu bar"/>
        </div>
    </div>
</main>
<footer class="footer"></footer>
<script src="js/app.min.js"></script>
</body>
</html>