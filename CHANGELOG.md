# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Conventional Commits](https://www.conventionalcommits.org/en/v1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## 0.6.2 Under development

- chore: migrate to `yii2-extensions/scaffold` consumer model with `php-forge/baseline` and `php-forge/coding-standard ^0.3@dev`.
- fix: remove `phpunit.xml` from `.gitignore`.
- docs: update changelog format to reference Conventional Commits.

## 0.6.1 May 1, 2026

- fix(deps): update `ui-awesome/html-mixin` requirement to `^0.6`.

## 0.6.0 April 30, 2026

- feat: add common attribute traits for blocking, media, type, nonce, integrity, referrer policy, source, target, link preload, metadata, form, and selectable attributes.
- feat: add enum values for autocomplete, type, and shared attribute allow-lists.
- feat: add prefixed `aria-*`, `data-*`, and `on*` attribute support.
- feat: add autocapitalize, autocorrect, selected, label, and for attribute APIs.
- fix: support `Stringable`, `UnitEnum`, and boolean values consistently in attribute setters.
- refactor: migrate attribute setters and tests to the simplified `addAttribute()` API.
- refactor: remove element, form, media, and interactive element-specific traits now owned by `ui-awesome/html`.
- refactor: move element-specific enum cases from `Attribute` to `ElementAttribute`.
- refactor: rename boolean attribute traits from `Has*` to `CanBe*` for clearer API names.
- refactor: rename image size traits to `HasImageSizes` and `HasImageSrcSet`.
- docs: standardize attribute PHPDoc and clarify value types across traits and enums.
- test: standardize test PHPDoc, provider organization, exception names, and attribute assertions.
- chore: update `ui-awesome/html-helper` to the stable `^0.7` constraint.
- refactor: align attributes, docs, tests, and release tooling with the current package scope.
- docs: update `UPGRADE.md` guide to reflect breaking changes and new attribute APIs.

## 0.5.2 January 29, 2026

- chore: add `php-forge/coding-standard` to development dependencies for code quality checks.
- docs: add automated refactoring guidance with Rector to the testing documentation.
- docs: update testing examples for running Composer scripts with arguments and align `.styleci.yml`.
- chore: remove the redundant `actionlint` ignore rule and simplify the Rector Composer script.

## 0.5.1 January 20, 2026

- chore: add `php-forge/support` as a development dependency and update related tests.

## 0.5.0 January 19, 2026

- feat: add href, crossorigin, decoding, fetchpriority, and other element attribute traits.
- feat: add attribute traits moved from `ui-awesome/html-core`.
- feat: add `HasForm` and shared form-related attribute APIs.
- docs: add development guide, sync metadata instructions, and improved testing documentation.
- docs: refresh SVG feature descriptions for MDN alignment.
- docs: clarify `Crossorigin` and `ElementAttribute` enum documentation.
- docs: standardize trait, enum, and test documentation.
- fix: use `getAttribute()` consistently in tests.
- chore: update `ui-awesome/html-helper` to `0.2`.

## 0.4.0 December 27, 2025

- chore: update `ui-awesome/html-helper` constraint to `^0.6`.

## 0.3.0 December 26, 2025

- refactor: improve codebase performance and maintainability.
- docs: improve HTML attribute test suite documentation.
- docs: add the StyleCI badge to `README.md`.

## 0.2.0 March 30, 2024

- chore: update `ui-awesome/html-helper` to `0.2`.

## 0.1.3 March 16, 2024

- fix: allow `data-*` attributes to accept `true` values when the `id` attribute is used.

## 0.1.2 March 14, 2024

- feat: add `HasAriaCurrent` trait and `ariaCurrent()` method.
- fix: change test attribute visibility to public.
- fix: remove dead code from `HasAriaCurrent`.
- fix: change the branch alias to `1.0-dev` in `composer.json`.
- fix: remove redundant abstract methods from data classes.

## 0.1.1 March 7, 2024

- fix: add boolean typing and default values to data attribute helper methods.

## 0.1.0 March 5, 2024

- feat: initial `ui-awesome/html-attribute` package structure.
