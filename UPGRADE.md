# Upgrade Guide

## 0.7.0

### Input type values

`Type` and `HasType` now cover only `<input>` control types. On the open `type()` setters provided by
`ui-awesome/html` (`A`, `Link`, `Script`, `Source`, and `Style`), replace removed script tokens and MIME cases with
their backed string values:

```php
// Before
Script::tag()->type(Type::MODULE);
Style::tag()->type(Type::TEXT_CSS);

// After
Script::tag()->type('module');
Style::tag()->type('text/css');
```

Custom non-input elements that compose `HasType` must remove the trait and declare their own open `type()` setter.
Passing a script token or MIME string to `HasType::type()` still throws `InvalidArgumentException`.

The removed ordered-list marker cases (`DECIMAL`, `LOWER_ALPHA`, `LOWER_ROMAN`, `UPPER_ALPHA`, and `UPPER_ROMAN`) have
no replacement in this package.

### Attribute enum ownership

Replace `ElementAttribute::REFERRERPOLICY` and `ElementAttribute::SRC` with the equivalent `Attribute` cases:

```php
use UIAwesome\Html\Attribute\Values\Attribute;

$this->addAttribute(Attribute::REFERRERPOLICY, $value);
$this->addAttribute(Attribute::SRC, $value);
```

### Exception messages

`UIAwesome\Html\Attribute\Exception\Message::KEY_MUST_BE_NON_EMPTY_STRING` was removed. Use
`UIAwesome\Html\Helper\Exception\Message::KEY_MUST_BE_NON_EMPTY_STRING` when asserting that error.

`ATTRIBUTE_VALUE_MUST_BE_SCALAR_OR_CLOSURE` was also removed and has no replacement.

## 0.6.0

### Element-owned traits

Traits under `UIAwesome\Html\Attribute\Element\*` were removed. Use the methods exposed by concrete elements in
`ui-awesome/html`, or define only the required setters in custom elements.
