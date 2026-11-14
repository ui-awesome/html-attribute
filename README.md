<!-- markdownlint-disable MD041 -->
<p align="center">
    <a href="https://github.com/ui-awesome/html-attribute" target="_blank">
        <img src="https://raw.githubusercontent.com/ui-awesome/.github/refs/heads/main/logo/ui_awesome.png" alt="UI Awesome" width="25%">
    </a>
    <h1 align="center">Html Attribute</h1>
    <br>
</p>
<!-- markdownlint-enable MD041 -->

<p align="center">
    <a href="https://github.com/ui-awesome/html-attribute/actions/workflows/build.yml" target="_blank">
        <img src="https://img.shields.io/github/actions/workflow/status/ui-awesome/html-attribute/build.yml?style=for-the-badge&label=PHPUnit&logo=github" alt="PHPUnit">
    </a>
    <a href="https://codecov.io/github/ui-awesome/html-attribute" target="_blank">
        <img src="https://img.shields.io/codecov/c/github/ui-awesome/html-attribute.svg?style=for-the-badge&logo=codecov&logoColor=white&label=Coverage" alt="Coverage">
    </a>
    <a href="https://dashboard.stryker-mutator.io/reports/github.com/ui-awesome/html-attribute/main" target="_blank">
        <img src="https://img.shields.io/endpoint?style=for-the-badge&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fui-awesome%2Fhtml-attribute%2Fmain" alt="Mutation Testing">
    </a>
    <a href="https://github.com/ui-awesome/html-attribute/actions/workflows/static.yml" target="_blank">
        <img src="https://img.shields.io/github/actions/workflow/status/ui-awesome/html-attribute/static.yml?style=for-the-badge&label=PHPStan&logo=github" alt="PHPStan">
    </a>
</p>

## Features

<picture>
    <source media="(max-width: 767px)" srcset="./docs/svgs/features-mobile.svg">
    <img src="./docs/svgs/features.svg" alt="Feature Overview" style="width: 100%;">
</picture>

<p align="center">
    <strong>A focused library for building and rendering structured HTML attributes</strong><br>
    <em>Type-safe helpers and value objects to compose complex attribute structures (classes, data-attributes, ARIA, etc.).</em>
</p>

### Installation

```bash
composer require ui-awesome/html-attribute:^0.8
```

### Quick start

Compose reusable attribute APIs by combining the package traits with the immutable attribute mixin.

```php
<?php

declare(strict_types=1);

namespace App;

use UIAwesome\Html\Attribute\Global\{HasClass, HasData, HasId};
use UIAwesome\Html\Attribute\HasRel;
use UIAwesome\Html\Attribute\Values\Rel;
use UIAwesome\Html\Helper\Attributes;
use UIAwesome\Html\Mixin\HasAttributes;

final class LinkAttributes
{
    use HasAttributes;
    use HasClass;
    use HasData;
    use HasId;
    use HasRel;

    public function render(): string
    {
        return Attributes::render($this->getAttributes());
    }
}

$attributes = (new LinkAttributes())
    ->id('documentation')
    ->class('nav-link')
    ->class('is-active')
    ->rel(Rel::NOOPENER)
    ->addDataAttribute('tracking', 'docs');

echo '<a' . $attributes->render() . ' href="/docs">Documentation</a>';
// <a class="nav-link is-active" id="documentation" rel="noopener" data-tracking="docs" href="/docs">Documentation</a>
```

## Documentation

For detailed configuration options and advanced usage, see the [repository](https://github.com/ui-awesome/html-attribute):

- 🧪 [Testing Guide](https://github.com/ui-awesome/html-attribute/blob/main/docs/testing.md)

## AI assistance

AI agents: read the [documentation index](https://yii2-framework.github.io/docs/llms.txt) and fetch the Markdown version
of a page by appending `index.md` to its URL. The
[AI agents guide](https://github.com/yii2-framework/docs/blob/main/src/content/docs/project/ai-agents.md) covers skill installation, client setup and
verification.

- 🤖 [`ui-awesome-html-attribute` skill](https://github.com/ui-awesome/html-attribute): global, ARIA, `data-*`, event and element-specific attribute
  traits, and their value enums.

Match the installed package revision. If hosted documentation does not match or is unavailable, use the
[repository guides](#documentation), the installed skill source at `skills/ui-awesome-html-attribute/SKILL.md`, the source
PHPDoc and the [changelog](CHANGELOG.md). The package-specific AI guide is available in the repository after the pending
skill changes are published. This package is framework-independent and does not render HTML by itself; rendering comes
from `ui-awesome/html-helper`.

## Package information

[![PHP](https://img.shields.io/badge/%3E%3D8.3-777BB4.svg?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net/releases/8.3/en.php)
[![Latest Stable Version](https://img.shields.io/packagist/v/ui-awesome/html-attribute.svg?style=for-the-badge&logo=packagist&logoColor=white&label=Stable)](https://packagist.org/packages/ui-awesome/html-attribute)
[![Total Downloads](https://img.shields.io/packagist/dt/ui-awesome/html-attribute.svg?style=for-the-badge&logo=composer&logoColor=white&label=Downloads)](https://packagist.org/packages/ui-awesome/html-attribute)

## Project status

[![PHPStan Level Max](https://img.shields.io/badge/PHPStan-Level%20Max-4F5D95.svg?style=for-the-badge&logo=github&logoColor=white)](https://github.com/ui-awesome/html-attribute/actions/workflows/static.yml)
[![Quality](https://img.shields.io/github/actions/workflow/status/ui-awesome/html-attribute/quality.yml?style=for-the-badge&label=Quality&logo=github)](https://github.com/ui-awesome/html-attribute/actions/workflows/quality.yml)
[![StyleCI](https://img.shields.io/badge/dynamic/xml?url=https%3A%2F%2Fgithub.styleci.io%2Frepos%2F767435734%2Fshield%3Fbranch%3Dmain&query=%2F%2F*%5Blocal-name%28%29%3D%27text%27%5D%5B2%5D&label=StyleCI&style=for-the-badge&logo=github&logoColor=white&color=4F5D95)](https://github.styleci.io/repos/767435734?branch=main)

## Security

[![OpenSSF Scorecard](https://api.scorecard.dev/projects/github.com/ui-awesome/html-attribute/badge?style=for-the-badge)](https://scorecard.dev/viewer/?uri=github.com/ui-awesome/html-attribute)
[![Zizmor](https://img.shields.io/github/actions/workflow/status/ui-awesome/html-attribute/security.yml?style=for-the-badge&label=Zizmor&logo=github)](https://github.com/ui-awesome/html-attribute/actions/workflows/security.yml)

## Built with AI

[![Built with Claude Code](https://img.shields.io/badge/Built%20with-Claude%20Code-D97757.svg?style=for-the-badge&logo=claude&logoColor=white)](https://claude.com/claude-code)
[![Built with Codex](https://img.shields.io/badge/Built%20with-Codex-10A37F.svg?style=for-the-badge&logo=openaigym&logoColor=white)](https://openai.com/codex)
[![Reviewed by CodeRabbit](https://img.shields.io/badge/Reviewed%20by-CodeRabbit-FF570A.svg?style=for-the-badge&logo=coderabbit&logoColor=white)](https://www.coderabbit.ai)

## Our social networks

[![Follow on X](https://img.shields.io/badge/-Follow%20on%20X-1DA1F2.svg?style=for-the-badge&logo=x&logoColor=white&labelColor=000000)](https://x.com/Terabytesoftw)
[![Follow on Facebook](https://img.shields.io/badge/-Follow%20on%20Facebook-1877F2.svg?style=for-the-badge&logo=facebook&logoColor=white&labelColor=000000)](https://www.facebook.com/wilmer.arambula.9)

## License

[![License](https://img.shields.io/badge/License-BSD--3--Clause-brightgreen.svg?style=for-the-badge&logo=opensourceinitiative&logoColor=white&labelColor=555555)](LICENSE)
