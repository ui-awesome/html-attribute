# ChangeLog

## 0.5.3 Under development

- Enh #32: Add `HasBlocking` trait and `blocking()` method to manage `blocking` attribute for HTML elements (@terabytesoftw)
- Enh #33: Add `HasMedia` trait and `media()` method to manage `media` attribute for HTML elements (@terabytesoftw)
- Enh #34: Add `HasType` trait and `type()` method to manage `type` attribute for HTML elements (@terabytesoftw)
- Enh #35: Add `HasNonce` trait and `nonce()` method to manage `nonce` attribute for HTML elements (@terabytesoftw)
- Bug #36: Clarify documentation for various HTML attributes to specify value types for better understanding (@terabytesoftw)
- Enh #37: Add `HasIntegrity` trait and `integrity()` method to manage `integrity` attribute for HTML elements (@terabytesoftw)
- Enh #38: Add `HasReferrerpolicy` trait and `referrerpolicy()` method to manage `referrerpolicy` attribute for HTML elements (@terabytesoftw)
- Enh #39: Add `HasSrc` trait and `src()` method to manage `src` attribute for HTML elements (@terabytesoftw)
- Bug #40: Enhance documentation for HTML attributes (@terabytesoftw)
- Enh #41: Add `HasTarget` trait and `target()` method to manage `target` attribute for HTML elements (@terabytesoftw)
- Enh #42: Add `HasAs` trait and `as()` method to manage `as` attribute for HTML elements (@terabytesoftw)
- Bug #43: Update copyright year to `2026` in multiple files (@terabytesoftw)
- Enh #44: Add `HasDisabled` trait and `disabled()` method to manage `disabled` attribute for HTML elements (@terabytesoftw)
- Enh #45: Add `HasHreflang` trait and `hreflang()` method to manage `hreflang` attribute for HTML elements (@terabytesoftw)
- Enh #46: Add `HasImagesizes` trait and `imagesizes()` method to manage `imagesizes` attribute for HTML elements (@terabytesoftw)
- Enh #47: Add `HasImagesrcset` trait and `imagesrcset()` method to manage `imagesrcset` attribute for HTML elements (@terabytesoftw)
- Enh #48: Add `HasSizes` trait and `sizes()` method to manage `sizes` attribute for HTML elements (@terabytesoftw)
- Enh #49: Add `HasCharset` trait and `charset()` method to manage `charset` attribute for HTML elements (@terabytesoftw)
- Enh #50: Add `HasContent` trait and `content()` method to manage `content` attribute for HTML elements (@terabytesoftw)
- Enh #51: Add `HasHttpEquiv` trait and `httpEquiv()` method to manage `http-equiv` attribute for HTML elements (@terabytesoftw)
- Enh #52: Add `HasName` trait and `name()` method to manage `name` attribute for HTML elements (@terabytesoftw)
- Bug #53: Update documentation for various HTML attributes and their usage in elements (@terabytesoftw)
- Enh #54: Add `HasDownload` trait and `download()` method to manage `download` attribute for HTML elements (@terabytesoftw)
- Enh #55: Add `HasPing` trait and `ping()` method to manage `ping` attribute for HTML elements (@terabytesoftw)
- Enh #56: Add `HasLoading` trait and `loading()` method to manage `loading` attribute for HTML elements (@terabytesoftw)
- Enh #57: Add `HasSrcset` trait and `srcset()` method to manage `srcset` attribute for HTML elements (@terabytesoftw)
- Enh #58: Add `HasUsemap` trait and `usemap()` method to manage `usemap` attribute for HTML elements (@terabytesoftw)
- Enh #59: Add `HasValue` trait and `value()` method to manage `value` attribute for HTML elements (@terabytesoftw)
- Enh #60: Add `HasForm` trait and `form()` method to manage `form` attribute for HTML elements (@terabytesoftw)
- Enh #61: Add `Type` enum for common `type` attribute values (@terabytesoftw)
- Enh #62: Add `HasMax`, `HasMin` traits and `max()`, `min()` methods to manage `max` and `min` attributes for HTML elements (@terabytesoftw)
- Enh #63: Add `HasReadonly`, `HasStep` traits and `readonly()`, `step()` methods to manage `readonly` and `step` attributes for HTML elements (@terabytesoftw)
- Enh #64: Add `HasMaxlength`, `HasMinlength` traits and `maxlength()`, `minlength()` methods to manage `maxlength` and `minlength` attributes for HTML elements (@terabytesoftw)
- Enh #65: Add `HasRequired` trait and `required()` method to manage `required` attribute for HTML elements (@terabytesoftw)
- Bug #66: Enhance HTML attribute element handling with Stringable and UnitEnum support (@terabytesoftw)
- Enh #67: Add `HasAccept`, `HasAutocomplete` traits and `accept()`, `autocomplete()` methods to manage `accept` and `autocomplete` attributes for HTML elements (@terabytesoftw)
- Enh #68: Add `HasChecked`, `HasDirname` traits and `checked()`, `dirname()` methods to manage `checked` and `dirname` attributes for HTML elements (@terabytesoftw)
- Enh #69: Add `HasList`, `HasMultiple` traits and `list()`, `multiple()` methods to manage `list` and `multiple` attributes for HTML elements (@terabytesoftw)
- Enh #70: Add `HasPattern`, `HasPlaceholder`, `HasSize` traits and `pattern()`, `placeholder()`, `size()` methods to manage `pattern`, `placeholder`, and `size` attributes for HTML elements (@terabytesoftw)
- Bug #71: Move HTML attribute traits to `Form` namespace and update related imports accordingly (@terabytesoftw)
- Bug #72: Update documentation for HTML attribute elements in `Element` namespace (@terabytesoftw)
- Bug #73: Standardize PHPDoc headers across src directory files (@terabytesoftw)
- Bug #74: Remove directory `tests\Stub` and move `tests\Support\Provider` to `tests\Provider` in tests (@terabytesoftw)
- Bug #75: Standardize PHPDoc headers for test classes (@terabytesoftw)
- Bug #76: Move `HasDisabled` trait to `UIAwesome\Html\Attribute` namespace and update related imports accordingly (@terabytesoftw)
- Enh #77: Add `Autocomplete` enum and update `AutocompleteProvider` to add test data (@terabytesoftw)
- Enh #78: Add `HasPopover`, `HasPopoverTarget`, `HasPopoverTargetAction` traits and `popover()`, `popoverTarget()`, `popoverTargetAction()` methods to manage popover attributes for HTML elements (@terabytesoftw)
- Enh #79: Add `HasInputmode` trait and `inputmode()` method to manage `inputmode` attribute for HTML elements (@terabytesoftw)
- Bug #80: Update `value()` method in `HasValue` trait to accept boolean values and adjust related tests and data provider (@terabytesoftw)

## 0.5.2 January 29, 2026

- Enh #28: Add `php-forge/coding-standard` to development dependencies for code quality checks (@terabytesoftw)
- Bug #29: Add section for automated refactoring using `Rector` in testing documentation (@terabytesoftw)
- Bug #30: Update examples in `testing.md` for running Composer script with arguments and update `.styleci.yml` accordingly (@terabytesoftw)
- Bug #31: Remove redundant ignore rule in `actionlint.yml` configuration and update Rector command in `composer.json` to remove unnecessary 'src' argument (@terabytesoftw)

## 0.5.1 January 20, 2026

- Enh #27: Add `php-forge/support` as a development dependency and update related test classes (@terabytesoftw)

## 0.5.0 January 19, 2026

- Enh #14: Add `HasHref` trait and `href()` method to manage `href` attribute for HTML elements (@terabytesoftw)
- Enh #15: Add `HasCrossorigin` trait and `crossorigin()` method to manage `crossorigin` attribute for HTML elements (@terabytesoftw)
- Enh #16: Use package `ui-awesome/html-mixin` for mixin traits and update related imports accordingly (@terabytesoftw)
- Enh #17: Add development guide and sync metadata instructions and update testing documentation (@terabytesoftw)
- Enh #18: Move attribute traits from `ui-awesome/html-core` package and update related imports accordingly (@terabytesoftw)
- Bug #19: Update alert content in SVGs to reflect accurate descriptions for MDN standards compliance and specific & lightweight features (@terabytesoftw)
- Enh #20: Add `HasDecoding` trait and `decoding()` method to manage `decoding` attribute for HTML elements (@terabytesoftw)
- Enh #21: Add `HasFetchpriority` trait and `fetchpriority()` method to manage `fetchpriority` attribute for HTML elements (@terabytesoftw)
- Bug #22: Update documentation for `Crossorigin` and `ElementAttribute` enums to clarify attribute representation and compliance with MDN standards (@terabytesoftw)
- Bug #23: Update attribute retrieval in tests to use `getAttribute()` method for consistency (@terabytesoftw)
- Bug #24: Update documentation traits and enums for clarity and consistency (@terabytesoftw)
- Bug #25: Update documentation tests classes for clarity and consistency (@terabytesoftw)
- Bug #26: Improve `testing.md` for clarity and consistency in Composer script usage (@terabytesoftw)

## 0.4.0 December 27, 2025

- Dep #13: Update `ui-awesome/html-helper` version constraint to `^0.6` in `composer.json` (@terabytesoftw)

## 0.3.0 December 26, 2025

- Bug #10: Refactor codebase to improve performance and maintainability (@terabytesoftw)
- Bug #11: Improve test suite documentation for HTML attributes with detailed descriptions and coverage (@terabytesoftw)
- Bug #12: Add `StyleCI` badge to `README.md` for code style checks (@terabytesoftw)

## 0.2.0 March 30, 2024

- Enh #9: Update `ui-awesome/html-helper` to `0.2` (@terabytesoftw)

## 0.1.3 March 16, 2024

- Bug #8: Fix all `data` attributes for accept `true` value when `id` attribute is used (@terabytesoftw)

## 0.1.2 March 14, 2024

- Bug #3: Change visibility property `attributes` to `public` in tests (@terabytesoftw)
- Enh #4: Add `HasAriaCurrent` trait and `ariaCurrent()` method (@terabytesoftw)
- Bug #5: Remove dead code in `HasAriaCurrent` trait (@terabytesoftw)
- Bug #6: Change branch alias to `1.0-dev` in `composer.json` (@terabytesoftw)
- Bug #7: Remove redundant abstract method in `data` classes (@terabytesoftw)

## 0.1.1 March 7, 2024

- Bug #2: Add bool typehint to `dataBsToggle()` method and add default value to `true` in `dataBsTarget()`, `dataBstoggle()`, `dataDismissTarget()`, `dataDrawerTarget()`, `dataDrawerTarget()`,`dataDropdownToggle()` and `dataToggle()` (@terabytesoftw)

## 0.1.0 March 5, 2024

- Initial release
