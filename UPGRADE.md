# Upgrade Guide

## 0.6.0

### Breaking changes

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
