---
name: ui-awesome-html-attribute
description: Use when composing typed HTML attribute traits (global, ARIA, data-*, events, element-specific) and value enums from ui-awesome/html-attribute in PHP classes. Not for rendering or encoding HTML (ui-awesome/html-helper), Yii widgets, database models or frontend assets.
license: BSD-3-Clause
---

# Work with typed HTML attribute traits and values

## Resolve the actual package

Inspect the installed package path, reference and PHP constraint before choosing an API; read the constraint from the
installed `composer.json`. Compare Composer installed metadata, the lockfile and actual source; modified/path repositories
may differ from a published revision. A skill installation does not install runtime dependencies.

Start with the trait for the attribute the task needs (`src/` for element attributes, `src/Global/` for global ones) and
its enum in `src/Values/`. Composer archives exclude `docs/` and `tests/`: use the installed source, or the repository at
the matching revision for guides and tests, not an assumed latest API.

## Package-specific workflow

- This package supplies attribute traits and value enums, not a renderer by itself. Compose traits with a compatible attribute bag implementation such as html-mixin `HasAttributes`.

- `class()` merges classes unless `$override` is `true`. Individual attribute setters replace the value for their key;
  passing `null` removes that key. Data, ARIA and event batch methods update the supplied keys and preserve other keys.
  They return the same instance for an empty array; nonempty updates return a new instance. Removal methods also return
  an updated instance.

- Use actual enum cases from `Values`; do not assume all setters accept the same enum/string union. Read the corresponding helper before asserting normalization or validation.

- Validate semantic constraints separately from encoding. Arbitrary event, URL and CSS values are not made safe merely by assigning an attribute. Test class merging, prefixed data/ARIA values and null removal.

## Verify the result

Execute focused examples against the inspected package and its actual dependencies, asserting normal, boundary and
negative cases with explicit failures rather than `assert()`, which may be disabled. Preserve supported PHP versions and
report missing runtime or tooling instead of changing constraints. Do not install dependencies or modify unrelated files
unless the task asks for it.
