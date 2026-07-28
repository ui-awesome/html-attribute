# Upgrade Guide

## 0.7.0

- The `Type` enum was narrowed to the 22 `<input>` control types; eleven cases were removed.
- The `ElementAttribute::REFERRERPOLICY` and `ElementAttribute::SRC` cases were removed.
- The `Message::ATTRIBUTE_VALUE_MUST_BE_SCALAR_OR_CLOSURE` and `Message::KEY_MUST_BE_NON_EMPTY_STRING` cases were
  removed.

### `Type` is the `<input>` control type domain

`Type` mixed three unrelated domains behind one name, so `HasType::type()` accepted `checkbox` on a `<link>` and
rejected valid MIME types such as `application/rss+xml`. It now declares only the `<input>` control types, and
`HasType` is reserved for form controls.

Removed cases and their replacements:

| Removed case             | Backed value       | Replacement                                          |
| ------------------------ | ------------------ | ---------------------------------------------------- |
| `Type::MODULE`           | `module`           | `string` passed to `Script::type()`                  |
| `Type::IMPORTMAP`        | `importmap`        | `string` passed to `Script::type()`                  |
| `Type::SPECULATIONRULES` | `speculationrules` | `string` passed to `Script::type()`                  |
| `Type::TEXT_JAVASCRIPT`  | `text/javascript`  | `string` passed to `Script::type()`                  |
| `Type::TEXT_CSS`         | `text/css`         | `string` passed to `Link::type()` or `Style::type()` |
| `Type::TEXT_HTML`        | `text/html`        | `string` passed to `A::type()` or `Link::type()`     |
| `Type::DECIMAL`          | `1`                | none                                                 |
| `Type::LOWER_ALPHA`      | `a`                | none                                                 |
| `Type::LOWER_ROMAN`      | `i`                | none                                                 |
| `Type::UPPER_ALPHA`      | `A`                | none                                                 |
| `Type::UPPER_ROMAN`      | `I`                | none                                                 |

The script tokens and MIME types are now plain strings on the matching `ui-awesome/html` elements, which no longer
validate `type` against a closed list. This includes `<source>`: `Source::type()` already accepted plain strings, so
any removed case previously passed to it becomes its backed value (`'text/html'` for the removed `Type::TEXT_HTML`).

Before:

```php
use UIAwesome\Html\Attribute\Values\Type;

Script::tag()->type(Type::MODULE);
Style::tag()->type(Type::TEXT_CSS);
```

After:

```php
Script::tag()->type('module');
Style::tag()->type('text/css');
```

The five `<ol>` numbering markers had no consumer in the ecosystem. If `<ol>` gains a `type()` setter it will declare
its own closed enum; do not recycle `Type` for it.

### `referrerpolicy` and `src` are owned by the `Attribute` enum

`ElementAttribute` duplicated two cases already provided by `Attribute` with identical backed values. Downstream
consumers reading either name through `ElementAttribute` must switch to the `Attribute` enum; the backed values
(`referrerpolicy` and `src`) are unchanged, so rendered markup stays the same.

Before:

```php
use UIAwesome\Html\Attribute\Values\ElementAttribute;

$this->addAttribute(ElementAttribute::REFERRERPOLICY, $value);
$this->addAttribute(ElementAttribute::SRC, $value);
```

After:

```php
use UIAwesome\Html\Attribute\Values\Attribute;

$this->addAttribute(Attribute::REFERRERPOLICY, $value);
$this->addAttribute(Attribute::SRC, $value);
```

### Non-empty key message consolidated on `ui-awesome/html-helper`

`UIAwesome\Html\Attribute\Exception\Message` no longer declares `KEY_MUST_BE_NON_EMPTY_STRING`. The exception is raised
by `ui-awesome/html-helper`, so assert against that package's enum instead. The message string is unchanged.

`ATTRIBUTE_VALUE_MUST_BE_SCALAR_OR_CLOSURE` was never raised by this package and has no replacement here.
`ATTRIBUTE_INVALID_VALUE` is unaffected.

Before:

```php
use UIAwesome\Html\Attribute\Exception\Message;

$this->expectExceptionMessage(Message::KEY_MUST_BE_NON_EMPTY_STRING->getMessage());
```

After:

```php
use UIAwesome\Html\Helper\Exception\Message;

$this->expectExceptionMessage(Message::KEY_MUST_BE_NON_EMPTY_STRING->getMessage());
```

## 0.6.0

- Element-specific attribute traits were removed from `UIAwesome\Html\Attribute\Element`.
- Form-specific attribute traits were removed from `UIAwesome\Html\Attribute\Form`.
- Media and interactive element-specific traits were removed from `UIAwesome\Html\Attribute`.
- Element-specific enum cases were moved from `Attribute` to `ElementAttribute`.
- Boolean attribute traits now use the `CanBe*` naming style.
- Image descriptor traits were renamed to `HasImageSizes` and `HasImageSrcSet`.

### Element and form traits moved to `ui-awesome/html`

`ui-awesome/html-attribute` now only owns reusable attribute traits, global attributes, prefix helpers, and shared value
enums. Element-owned APIs now live with their concrete HTML elements in `ui-awesome/html`.

Remove these imports from application code:

- `UIAwesome\Html\Attribute\Element\HasAlt`
- `UIAwesome\Html\Attribute\Element\HasDecoding`
- `UIAwesome\Html\Attribute\Element\HasHeight`
- `UIAwesome\Html\Attribute\Element\HasHref`
- `UIAwesome\Html\Attribute\Element\HasLoading`
- `UIAwesome\Html\Attribute\Element\HasPopoverTarget`
- `UIAwesome\Html\Attribute\Element\HasPopoverTargetAction`
- `UIAwesome\Html\Attribute\Element\HasReferrerpolicy`
- `UIAwesome\Html\Attribute\Element\HasSrc`
- `UIAwesome\Html\Attribute\Element\HasSrcset`
- `UIAwesome\Html\Attribute\Element\HasUsemap`
- `UIAwesome\Html\Attribute\Element\HasWidth`
- `UIAwesome\Html\Attribute\Form\CanBeChecked`
- `UIAwesome\Html\Attribute\Form\CanBeMultiple`
- `UIAwesome\Html\Attribute\Form\CanBeReadonly`
- `UIAwesome\Html\Attribute\Form\CanBeRequired`
- `UIAwesome\Html\Attribute\Form\HasAccept`
- `UIAwesome\Html\Attribute\Form\HasAutocomplete`
- `UIAwesome\Html\Attribute\Form\HasDirname`
- `UIAwesome\Html\Attribute\Form\HasForm`
- `UIAwesome\Html\Attribute\Form\HasList`
- `UIAwesome\Html\Attribute\Form\HasMax`
- `UIAwesome\Html\Attribute\Form\HasMaxlength`
- `UIAwesome\Html\Attribute\Form\HasMin`
- `UIAwesome\Html\Attribute\Form\HasMinlength`
- `UIAwesome\Html\Attribute\Form\HasPattern`
- `UIAwesome\Html\Attribute\Form\HasPlaceholder`
- `UIAwesome\Html\Attribute\Form\HasSize`
- `UIAwesome\Html\Attribute\Form\HasStep`

Use the concrete elements from `ui-awesome/html` instead, or keep element-specific setters local to your component.

Before:

```php
use UIAwesome\Html\Attribute\Element\HasSrc;
use UIAwesome\Html\Attribute\Form\HasPlaceholder;

final class CustomInput
{
    use HasPlaceholder;
    use HasSrc;
}
```

After:

```php
use UIAwesome\Html\Embedded\Img;
use UIAwesome\Html\Form\InputText;

echo Img::tag()
    ->src('/logo.png')
    ->render();

echo InputText::tag()
    ->placeholder('Search')
    ->render();
```

### Media and interactive traits are no longer exported

The following element-owned traits were removed from `ui-awesome/html-attribute` development builds and are owned by
`ui-awesome/html` elements instead:

- `CanBeAutoplay`
- `CanBeControls`
- `CanBeDefault`
- `CanBeDisableRemotePlayback`
- `CanBeLoop`
- `CanBeMuted`
- `CanBeOpen`
- `HasClosedby`
- `HasControlslist`
- `HasPreload`
- `HasSrclang`

Use `Audio`, `Video`, `Track`, `Details`, or `Dialog` from `ui-awesome/html` for those methods.

### Enum case migration

Import `ElementAttribute` for element-specific attribute names that were previously accessed through `Attribute` in
0.6 development builds.

Before:

```php
use UIAwesome\Html\Attribute\Values\Attribute;

$attribute = Attribute::AS;
```

After:

```php
use UIAwesome\Html\Attribute\Values\ElementAttribute;

$attribute = ElementAttribute::AS;
```

Moved cases:

- `AS`
- `AUTOPLAY`
- `BLOCKING`
- `CHARSET`
- `CLOSEDBY`
- `CONTROLS`
- `CONTROLSLIST`
- `DEFAULT`
- `DISABLEREMOTEPLAYBACK`
- `DOWNLOAD`
- `HREFLANG`
- `HTTP_EQUIV`
- `IMAGESIZES`
- `IMAGESRCSET`
- `KIND`
- `LABEL`
- `LIST`
- `LOOP`
- `MUTED`
- `NAME`
- `OPEN`
- `PING`
- `PRELOAD`
- `SELECTED`
- `SIZES`
- `SRCLANG`
- `VALUE`

### Trait rename migration

Update imports for renamed traits. Public setter method names remain unchanged.

Before:

```php
use UIAwesome\Html\Attribute\HasImagesizes;
use UIAwesome\Html\Attribute\HasImagesrcset;
```

After:

```php
use UIAwesome\Html\Attribute\HasImageSizes;
use UIAwesome\Html\Attribute\HasImageSrcSet;
```

If you used development builds with boolean `Has*` traits, update to the `CanBe*` names:

- `HasDisabled` -> `CanBeDisabled`
- `HasSelected` -> `CanBeSelected`

### Attribute host requirements

Attribute traits expect the host class to expose `addAttribute()`, `getAttribute()`, and `getAttributes()` behavior.
Use `UIAwesome\Html\Mixin\HasAttributes` from `ui-awesome/html-mixin:^0.5` or provide compatible methods in custom
components.
