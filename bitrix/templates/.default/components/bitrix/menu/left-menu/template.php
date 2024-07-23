<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<?// dump($arResult);?>
<ul id="left-custom-menu">
    <?
    $previousLevel = 0;
    foreach($arResult as $arItem):?>

    <?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
        <?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
    <?endif?>

    <?if ($arItem["IS_PARENT"]):?>
    <li class="<?if ($arItem["SELECTED"]):?>open current<?else:?>close<?endif?>">
        <span class="sb_showchild"></span>
        <a href="<?=$arItem["LINK"]?>"><span><?=$arItem["TEXT"]?></span></a>
        <ul>
    <?else:?>
        <li class="<?if ($arItem["SELECTED"]):?>current<?else:?>close<?endif?>">
            <a href="<?=$arItem["LINK"]?>"><span><?=$arItem["TEXT"]?></span></a>
        </li>
    <?endif?>

    <?$previousLevel = $arItem["DEPTH_LEVEL"];?>

    <?endforeach?>

    <?if ($previousLevel > 1):// закрыть теги последних элементов?>
        <?=str_repeat("</ul></li>", ($previousLevel-1) );?>
    <?endif?>

</ul>
<?endif?>
