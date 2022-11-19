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
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
          rel="stylesheet">
    <link href="css/app.css" media="all" rel="stylesheet"/>
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
    [
        'listItemIcon' => 'icons-logo-tesla.svg',
        'listItemName' => 'TSLA.US',
        'listItemIsRingIcon' => true,
        'listItemValue' => '685.70',
        'listItemValueTrend' => 'static',
        'listItemExchangeTitle' => 'NASDAQ | Tesla Motors Inc',
        'listItemPercent1' => '28.75',
        'listItemPercent2' => '4.38%',
        'listItemPercentTrend' => 'positive',
    ],
    [
        'listItemIcon' => 'icons-logo-twitter.svg',
        'listItemName' => 'TWTR.US',
        'listItemIsRingIcon' => true,
        'listItemValue' => '69.86',
        'listItemValueTrend' => 'negative',
        'listItemExchangeTitle' => 'NASDAQ | Twitter Inc.',
        'listItemPercent1' => '0.89',
        'listItemPercent2' => '1.29%',
        'listItemPercentTrend' => 'static',
    ],
    [
        'listItemIcon' => 'icons-logo-virgin.svg',
        'listItemName' => 'SPCE.US',
        'listItemLongShort' => 'long',
        'listItemTpSlTsl' => 'tsl',
        'listItemIsRingIcon' => false,
        'listItemValue' => '40.69',
        'listItemValueTrend' => 'static',
        'listItemExchangeTitle' => 'NASDAQ | Virgin Galactic',
        'listItemPercent1' => '-8.51',
        'listItemPercent2' => '-17.30%',
        'listItemPercentTrend' => 'negative',
        'listItemTime' => 'sunrise',
    ],
    [
        'listItemIcon' => 'icons-logo-nvidia.svg',
        'listItemName' => 'NVDA.US',
        'listItemLongShort' => 'short',
        'listItemTpSlTsl' => 'tsl',
        'listItemIsRingIcon' => false,
        'listItemValue' => '820.50',
        'listItemValueTrend' => 'static',
        'listItemExchangeTitle' => 'NASDAQ | Virgin Galactic',
        'listItemPercent1' => '18.49',
        'listItemPercent2' => '2.31%    ',
        'listItemPercentTrend' => 'positive',
        'listItemTime' => 'sundown',
    ],
    [
        'listItemIcon' => 'icons-logo-f.svg',
        'listItemName' => 'FRHC.US',
        'listItemValue' => '64.76',
        'listItemValueTrend' => 'static',
        'listItemExchangeTitle' => 'NASDAQ | FREEDOM HOLDING CORP-NV',
        'listItemPercent1' => '0.51',
        'listItemPercent2' => '0.79%',
        'listItemPercentTrend' => 'static',
        'listItemTime' => 'night',
    ],
]; ?>
<header class="header"></header>
<main class="main">
    <div class="fake-phone" style="display: none;">
        <div class="fake-phone__header">
            <img src="images/phone-nav-bar.svg" alt="phone bar top"/>
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
                    <div class="list-item <?php if(isset($listItem['listItemTime']) && ($listItem['listItemTime'] == 'night')) { ?> list-item__disabled <?php } ?>">
                        <div class="list-item__line list-item__line_top">
                            <div class="list-item__line_top--left">
                                <?php if (isset($listItem['listItemIcon'])) { ?>
                                    <img src="images/<?= $listItem['listItemIcon']; ?>" alt="F"/>
                                <?php } ?>
                                <span class="list-item__exchange-name"><?= $listItem['listItemName']; ?></span>
                                <?php if (isset($listItem['listItemLongShort'])) { ?>
                                    <span class="list-item__exchange-term<?php if ($listItem['listItemLongShort'] == 'long') { ?> list-item__exchange-term_blue<?php } ?><?php if ($listItem['listItemLongShort'] == 'short') { ?> list-item__exchange-term_red<?php } ?>"><?= $listItem['listItemLongShort']; ?></span>
                                <?php } ?>
                                <?php if (isset($listItem['listItemTpSlTsl'])) { ?>
                                    <span class="list-item__tpsltsl<?php if ($listItem['listItemTpSlTsl'] == 'tp') { ?> list-item__tpsltsl_green<?php } ?><?php if ($listItem['listItemTpSlTsl'] == 'sl') { ?> list-item__tpsltsl_red<?php } ?><?php if ($listItem['listItemTpSlTsl'] == 'tsl') { ?> list-item__tpsltsl_orange<?php } ?>"><?= $listItem['listItemTpSlTsl']; ?></span>
                                <?php } ?>
                                <?php if (isset($listItem['listItemIsRingIcon']) && ($listItem['listItemIsRingIcon'] == true)) { ?>
                                    <span class="list-item__ring-icon">
                                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                             xmlns="http://www.w3.org/2000/svg"><rect x="0.138672" y="0.0671387"
                                                                                      width="16" height="16" rx="8"
                                                                                      fill="#007AFF"/>
<g clip-path="url(#clip0_40_322)"><path
            d="M8.13883 3.90047C7.79383 3.90047 7.51383 4.18047 7.51383 4.52547V4.81519C6.43592 5.0931 5.63883 6.06922 5.63883 7.23381V9.73381L4.8055 10.5671V10.9838H11.4722V10.5671L10.6388 9.73381V7.23381C10.6388 6.06922 9.84175 5.09392 8.76383 4.816V4.52547C8.76383 4.18047 8.48383 3.90047 8.13883 3.90047H8.13883ZM7.3055 11.4005C7.3055 11.8609 7.67883 12.2338 8.13883 12.2338C8.59883 12.2338 8.97217 11.8605 8.97217 11.4005H7.3055Z"
            fill="white"/></g><defs><clipPath id="clip0_40_322"><rect width="10" height="10" fill="white"
                                                                      transform="translate(3.13867 3.06714)"/></clipPath></defs></svg>
                                    </span>
                                <?php } ?>
                            </div>
                            <div class="list-item__line_top--right">
                                <span class="list-item__value <?php if ($listItem['listItemValueTrend'] == 'positive') { ?> list-item__value_positive<?php } ?> <?php if ($listItem['listItemValueTrend'] == 'negative') { ?> list-item__value_negative<?php } ?><?php if ($listItem['listItemValueTrend'] == 'static') { ?> list-item__value_static<?php } ?>"><?= $listItem['listItemValue']; ?></span>
                            </div>
                        </div>
                        <div class="list-item__line list-item__line_bottom">
                            <div class="list-item__line_bottom--left  list-item__exchange-title"><?= $listItem['listItemExchangeTitle']; ?>
                            </div>
                            <div class="list-item__line_bottom--right">
                                <?php if (isset($listItem['listItemTime'])) { ?>
                                    <span class="list-item__time">
                                        <?php if ($listItem['listItemTime'] == 'sunrise') { ?>
                                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.23535 2.31714C9.07017 2.31714 8.90579 2.3801 8.77979 2.5061L6.78467 4.49976C6.48317 4.80201 6.69705 5.31714 7.12305 5.31714H11.3462C11.7729 5.31714 11.9875 4.80201 11.686 4.49976L9.69239 2.5061C9.56639 2.3801 9.40054 2.31714 9.23535 2.31714H9.23535ZM9.22364 6.80689C8.81 6.81335 8.47969 7.15349 8.48535 7.56714V9.06714C8.48153 9.33762 8.62364 9.5892 8.85726 9.72555C9.09088 9.86191 9.37983 9.86191 9.61345 9.72555C9.84707 9.5892 9.98918 9.33762 9.98535 9.06714V7.56714C9.98813 7.36441 9.90872 7.1692 9.76522 7.02598C9.62172 6.88275 9.42635 6.80372 9.22364 6.80689ZM3.92383 9.00562C3.61825 9.00568 3.34325 9.19112 3.22865 9.4744C3.11405 9.75768 3.18276 10.0822 3.40234 10.2947L4.46289 11.3552C4.651 11.5512 4.93034 11.6301 5.19317 11.5616C5.456 11.493 5.66125 11.2878 5.72977 11.025C5.79829 10.7621 5.71937 10.4828 5.52344 10.2947L4.46289 9.23413C4.32158 9.08808 4.12705 9.00562 3.92383 9.00562H3.92383ZM14.5234 9.00708C14.3286 9.01289 14.1437 9.09432 14.0078 9.23413L12.9473 10.2947C12.7513 10.4828 12.6724 10.7621 12.7409 11.025C12.8094 11.2878 13.0147 11.493 13.2775 11.5616C13.5404 11.6301 13.8197 11.5512 14.0078 11.3552L15.0684 10.2947C15.2902 10.0791 15.3569 9.74938 15.2363 9.46449C15.1157 9.17961 14.8327 8.99796 14.5234 9.00708L14.5234 9.00708ZM9.23535 11.3171C7.42999 11.3171 5.91169 12.6112 5.56152 14.3171H2.48535C2.21488 14.3133 1.96329 14.4554 1.82694 14.689C1.69058 14.9227 1.69058 15.2116 1.82694 15.4452C1.96329 15.6789 2.21488 15.821 2.48535 15.8171H15.9854C16.2558 15.821 16.5074 15.6789 16.6438 15.4452C16.7801 15.2116 16.7801 14.9227 16.6438 14.689C16.5074 14.4554 16.2558 14.3133 15.9854 14.3171H12.9092C12.559 12.6112 11.0407 11.3171 9.23535 11.3171Z"
                                                      fill="#F59E0B"/>
                                            </svg>
                                        <?php } ?>
                                        <?php if ($listItem['listItemTime'] == 'sundown') { ?>
                                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.12305 2.31714C6.69705 2.31714 6.48317 2.83227 6.78467 3.13452L8.77979 5.12817C9.03179 5.38017 9.44038 5.38017 9.69238 5.12817L11.686 3.13452C11.9875 2.83227 11.7729 2.31714 11.3462 2.31714H7.12305ZM9.22364 6.80689C8.81 6.81335 8.47969 7.15349 8.48535 7.56714V9.06714C8.48153 9.33762 8.62364 9.5892 8.85726 9.72555C9.09088 9.86191 9.37983 9.86191 9.61345 9.72555C9.84707 9.5892 9.98918 9.33762 9.98535 9.06714V7.56714C9.98813 7.36441 9.90872 7.1692 9.76522 7.02598C9.62172 6.88275 9.42635 6.80372 9.22364 6.80689ZM3.92383 9.00562C3.61825 9.00568 3.34325 9.19112 3.22865 9.4744C3.11405 9.75768 3.18276 10.0822 3.40234 10.2947L4.46289 11.3552C4.651 11.5512 4.93034 11.6301 5.19317 11.5616C5.456 11.493 5.66125 11.2878 5.72977 11.025C5.79829 10.7621 5.71937 10.4828 5.52344 10.2947L4.46289 9.23413C4.32158 9.08808 4.12705 9.00562 3.92383 9.00562H3.92383ZM14.5234 9.00708C14.3286 9.01289 14.1437 9.09432 14.0078 9.23413L12.9473 10.2947C12.7513 10.4828 12.6724 10.7621 12.7409 11.025C12.8094 11.2878 13.0147 11.493 13.2775 11.5616C13.5404 11.6301 13.8197 11.5512 14.0078 11.3552L15.0684 10.2947C15.2902 10.0791 15.3569 9.74938 15.2363 9.46449C15.1157 9.17961 14.8327 8.99796 14.5234 9.00708L14.5234 9.00708ZM9.23535 11.3171C7.42999 11.3171 5.91169 12.6112 5.56152 14.3171H2.48535C2.21488 14.3133 1.96329 14.4554 1.82694 14.689C1.69058 14.9227 1.69058 15.2116 1.82694 15.4452C1.96329 15.6789 2.21488 15.821 2.48535 15.8171H15.9854C16.2558 15.821 16.5074 15.6789 16.6438 15.4452C16.7801 15.2116 16.7801 14.9227 16.6438 14.689C16.5074 14.4554 16.2558 14.3133 15.9854 14.3171H12.9092C12.559 12.6112 11.0407 11.3171 9.23535 11.3171Z"
                                                      fill="#6366F1"/>
                                            </svg>
                                        <?php } ?>
                                        <?php if ($listItem['listItemTime'] == 'night') { ?>
                                            <svg width="15" height="12" viewBox="0 0 15 12" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.5658 0.401539C10.3441 0.413672 10.1431 0.535302 10.0294 0.725977C9.91583 0.916651 9.90454 1.15137 9.99935 1.35206C10.1097 1.58639 10.1387 1.9037 10.1387 2.34164C10.1387 3.19372 9.79012 3.87987 9.18294 4.28826C8.51245 3.54439 7.55273 3.0669 6.47201 3.0669C5.03667 3.0669 3.79796 3.89422 3.19596 5.09555C1.48663 5.23822 0.138672 6.65424 0.138672 8.40024C0.138672 10.2409 1.63134 11.7336 3.472 11.7336H10.1387C11.6113 11.7336 12.8053 10.5396 12.8053 9.0669C12.8053 8.39681 12.5495 7.79188 12.1413 7.32341C13.3244 6.71169 14.1387 5.47808 14.1387 4.06039C14.1387 2.09505 12.5744 0.489971 10.6322 0.401539C10.61 0.400435 10.5879 0.400435 10.5658 0.401539V0.401539ZM11.4017 1.93149C12.229 2.28818 12.8053 3.09545 12.8053 4.06039C12.8053 5.36083 11.7659 6.40024 10.4655 6.40024V6.43409C10.3572 6.42071 10.2506 6.40024 10.1387 6.40024C10.1327 6.40024 10.1277 6.40217 10.1217 6.40284C10.0908 6.05856 9.99885 5.7339 9.87956 5.42367C10.9031 4.7577 11.472 3.59454 11.472 2.34164C11.472 2.21584 11.4075 2.06466 11.4017 1.93149Z"
                                                      fill="#3C3C43" fill-opacity="0.6"/>
                                            </svg>
                                        <?php } ?>
                                    </span>
                                <?php } ?>
                                <span class="list-item__percents<?php if ($listItem['listItemPercentTrend'] == 'positive') { ?> list-item__percents_positive<?php } ?> <?php if ($listItem['listItemPercentTrend'] == 'negative') { ?> list-item__percents_negative<?php } ?>"><?= $listItem['listItemPercent1']; ?></span>
                                <span class="list-item__percents<?php if ($listItem['listItemPercentTrend'] == 'positive') { ?> list-item__percents_positive<?php } ?> <?php if ($listItem['listItemPercentTrend'] == 'negative') { ?> list-item__percents_negative<?php } ?>"><?= $listItem['listItemPercent2']; ?></span>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="fake-phone__footer">
            <img src="images/phone-menu-bar.svg" alt="phone menu bar"/>
        </div>
    </div>
    <div class="container">
        <div class="textsandstatus">
            <div id="texts"></div>
            <div class="exchangestatus">
                <span>EXCHANGE STATUS: </span>
                <span id="status"></span>
            </div>
        </div>
        <div id="results"></div>
    </div>
</main>
<footer class="footer"></footer>
<script src="js/scripts.js"></script>
</body>
</html>
