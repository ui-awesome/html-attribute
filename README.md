<p align="center">
    <a href="https://github.com/ui-awesome/html-attribute" target="_blank">
        <img src="https://avatars.githubusercontent.com/u/121752654?s=200&v=4" height="100px">
    </a>
    <h1 align="center">UI Awesome HTML Attribute Code Generator for PHP.</h1>
    <br>
</p>

<p align="center">
    <a href="https://github.com/ui-awesome/html-attribute/actions/workflows/build.yml" target="_blank">
        <img src="https://github.com/ui-awesome/html-attribute/actions/workflows/build.yml/badge.svg" alt="PHPUnit">
    </a>
    <a href="https://codecov.io/gh/ui-awesome/html-attribute" target="_blank">
        <img src="https://codecov.io/gh/ui-awesome/html-attribute/graph/badge.svg?token=D5xjQiJDRP" alt="Codecov">
    </a>
    <a href="https://dashboard.stryker-mutator.io/reports/github.com/ui-awesome/html-attribute/main" target="_blank">
        <img src="https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fui-awesome%2Fhtml-attribute%2Fmain" alt="Infection">
    </a>
    <a href="https://github.com/ui-awesome/html-attribute/actions/workflows/static.yml" target="_blank">
        <img src="https://github.com/ui-awesome/html-attribute/actions/workflows/static.yml/badge.svg" alt="Psalm">
    </a>
    <a href="https://github.styleci.io/repos/767435734?branch=main">
        <img src="https://github.styleci.io/repos/767435734/shield?branch=main" alt="Style ci">
    </a>
</p>

This package provides a set of traits to use in your classes to generate HTML attributes.

## Installation

The preferred way to install this extension is through [composer](https://getcomposer.org/download/).

Either run

```shell
composer require --prefer-dist ui-awesome/html-attribute:^0.1
```

or add

```json
"ui-awesome/html-attribute": "^0.1"
```

to the require section of your `composer.json` file. 

## Usage

List of traits avaibles to use in your classes:

### Aria

- [HasAriaControls](src/Aria/HasAriaControls.php)
- [HasAriaDescribedBy](src/Aria/HasAriaDescribedBy.php)
- [HasAriaDisabled](src/Aria/HasAriaDisabled.php)
- [HasAriaExpanded](src/Aria/HasAriaExpanded.php)
- [HasAriaLabel](src/Aria/HasAriaLabel.php)
- [HasAriaRole](src/Aria/HasAriaRole.php)

### Data

- [HasDataBsAutoClose](src/Data/HasDataBsAutoClose.php)
- [HasDataBsDismiss](src/Data/HasFataBsDismiss.php)
- [HasDataBsTarget](src/Data/HasDataBsTarget.php)
- [HasDataBsToggle](src/Data/HasDataBsToggle.php)
- [HasDataCollapseToggle](src/Data/HasDataCollapseToggle.php)
- [HasDataDissmissTarget](src/Data/HasDataDissmissTarget.php)
- [HasDataDrawerTarget](src/Data/HasDataDrawerTarget.php)
- [HasDataDropdownToggle](src/Data/HasDataDropdownToggle.php)
- [HasDataToggle](src/Data/HasDataToggle.php)
- [HasDataValue](src/Data/HasDataValue.php)

  > Note: Use enum classes [DataAttributeValues](src/Data/DataAttributeValues.php) for specify the data attribute keys.

### Global

- [CanBeAutofocus](src/CanBeAutofocus.php)
- [CanBeHidden](src/CanBeHidden.php)
- [HasAlt](src/HasAlt.php)
- [HasClass](src/HasClass.php)
- [HasData](src/HasData.php)
- [HasHeight](src/HasHeight.php)
- [HasId](src/HasId.php)
- [HasLang](src/HasLang.php)
- [HasName](src/HasName.php)
- [HasReferrerPolicy](src/HasReferrerPolicy.php)
- [HasRel](src/HasRel.php)
- [HasSrc](src/HasSrc.php)
- [HasStyle](src/HasStyle.php)
- [HasTabIndex](src/HasTabIndex.php)
- [HasTitle](src/HasTitle.php)
- [HasType](src/HasType.php)
- [HasValue](src/HasValue.php)
- [HasWidth](src/HasWidth.php)

### Form control

- [CanBeDisabled](src/FormControl/CanBeDisabled.php)
- [CanBeMultiple](src/FormControl/CanBeMultiple.php)
- [CanBeReadOnly](src/FormControl/CanBeReadOnly.php)
- [CanBeRequired](src/FormControl/CanBeRequired.php)
- [HasAccept](src/FormControl/Input/HasAccept.php)
- [HasAutoComplete](src/FormControl/HasAutoComplete.php)
- [HasDirname](src/FormControl/HasDirname.php)
- [HasFieldAttributes](src/FormControl/HasFieldAttributes.php)
- [HasForm](src/FormControl/HasForm.php)
- [HasFormaction](src/FormControl/HasFormaction.php)
- [HasFormenctype](src/FormControl/HasFormenctype.php)
- [HasFormmethod](src/FormControl/HasFormmethod.php)
- [HasFormnovalidate](src/FormControl/HasFormnovalidate.php)
- [HasFormtarget](src/FormControl/HasFormtarget.php)
- [HasMax](src/FormControl/HasMax.php)
- [HasMaxLength](src/FormControl/HasMaxLength.php)
- [HasMin](src/FormControl/HasMin.php)
- [HasMinLength](src/FormControl/HasMinLength.php)
- [HasPlaceholder](src/FormControl/HasPlaceholder.php)
- [HasSize](src/FormControl/HasSize.php)

#### Input

- [CanBeChecked](src/FormControl/Input/CanBeChecked.php)
- [HasPattern](src/FormControl/Input/HasPattern.php)
- [HasStep](src/FormControl/Input/HasStep.php)

## Testing

[Check the documentation testing](docs/testing.md) to learn about testing.

## Support versions

[![PHP81](https://img.shields.io/badge/PHP-%3E%3D8.1-787CB5)](https://www.php.net/releases/8.1/en.php)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

## Our social networks

[![Twitter](https://img.shields.io/badge/twitter-follow-1DA1F2?logo=twitter&logoColor=1DA1F2&labelColor=555555?style=flat)](https://twitter.com/Terabytesoftw)
