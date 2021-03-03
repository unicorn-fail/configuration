# league/configuration

[![Latest Version](https://img.shields.io/packagist/v/league/configuration.svg?style=flat-square)](https://packagist.org/packages/league/configuration)
[![Total Downloads](https://img.shields.io/packagist/dt/league/configuration.svg?style=flat-square)](https://packagist.org/packages/league/configuration)
[![Software License](https://img.shields.io/badge/License-BSD--3-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status](https://img.shields.io/github/workflow/status/thephpleague/configuration/Tests/latest.svg?style=flat-square)](https://github.com/thephpleague/configuration/actions?query=workflow%3ATests+branch%3Alatest)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/thephpleague/configuration.svg?style=flat-square)](https://scrutinizer-ci.com/g/thephpleague/configuration/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/thephpleague/configuration.svg?style=flat-square)](https://scrutinizer-ci.com/g/thephpleague/configuration)
[![CII Best Practices](https://bestpractices.coreinfrastructure.org/projects/126/badge)](https://bestpractices.coreinfrastructure.org/projects/126)

[![Sponsor development of this project](https://img.shields.io/badge/sponsor%20this%20package-%E2%9D%A4-ff69b4.svg?style=flat-square)](https://www.colinodell.com/sponsor)

![league/configuration](banner.png)

**league/configuration** is a simplified and structured way to provide configuration in your PHP project

## 📦 Installation & Basic Usage

This project requires PHP `7.2.5` or higher.  To install it via [Composer] simply run:

``` bash
$ composer require league/configuration
```

> **NOTE:** Until this is actually published in the `league` namespace on packagist.com, you will need to add the
> following to your `composer.json` file:
>
> ```json
>     "repositories": [
>         {
>             "type": "vcs",
>             "url": "https://github.com/unicorn-fail/configuration.git"
>         }
>     ],
>     "require": {
>         "league/configuration": "dev-latest"
>     }
> ```
>

## 📓 Documentation

@todo

## 🏷️ Versioning

[SemVer](http://semver.org/) is followed closely. Minor and patch releases should not introduce breaking changes to the codebase; however, they might change the resulting AST or HTML output of parsed Markdown (due to bug fixes, spec changes, etc.)  As a result, you might get slightly different HTML, but any custom code built onto this library should still function correctly.

Any classes or methods marked `@internal` are not intended for use outside of this library and are subject to breaking changes at any time, so please avoid using them.

## 🛠️ Maintenance & Support

When a new **minor** version (e.g. `1.4` -> `1.5`) is released, the previous one (`1.4`) will continue to receive security and critical bug fixes for *at least* 3 months.

When a new **major** version is released (e.g. `1.5` -> `2.0`), the previous one (`1.5`) will receive critical bug fixes for *at least* 3 months and security updates for 6 months after that new release comes out.

(This policy may change in the future and exceptions may be made on a case-by-case basis.)

**Professional support, including notification of new releases and security updates, is available through a [Tidelift Subscription](https://tidelift.com/subscription/pkg/packagist-league-configuration?utm_source=packagist-league-configuration&utm_medium=referral&utm_campaign=readme).**

## 👷‍♀️ Contributing

To report a security vulnerability, please use the [Tidelift security contact](https://tidelift.com/security). Tidelift will coordinate the fix and disclosure with us.

Please see [CONTRIBUTING](https://github.com/thephpleague/configuration/blob/latest/.github/CONTRIBUTING.md) for additional details.

## 🧪 Testing

``` bash
$ composer test
```

## 👥 Credits & Acknowledgements

- [Colin O'Dell][@colinodell]
- [Mark Halliwell][@markehalliwell]
- [All Contributors]

### Sponsors

We'd also like to extend our sincere thanks the following sponsors who support ongoing development of this project:

 - [Tidelift](https://tidelift.com/subscription/pkg/packagist-league-configuration?utm_source=packagist-league-configuration&utm_medium=referral&utm_campaign=readme) for offering support to both the maintainers and end-users through their [professional support](https://tidelift.com/subscription/pkg/packagist-league-configuration?utm_source=packagist-league-configuration&utm_medium=referral&utm_campaign=readme) program
 - [JetBrains](https://www.jetbrains.com/) for supporting this project with complimentary [PhpStorm](https://www.jetbrains.com/phpstorm/) licenses

Are you interested in sponsoring development of this project? See <https://www.colinodell.com/sponsor> for a list of ways to contribute.

## 📄 License

**league/configuration** is licensed under the BSD-3 license.  See the [`LICENSE`](LICENSE) file for more details.

## 🏛️ Governance

This project is primarily maintained by [Colin O'Dell][@colinodell].  Members of the [PHP League] Leadership Team may occasionally assist with some of these duties.

---

<div align="center">
	<b>
		<a href="https://tidelift.com/subscription/pkg/packagist-league-configuration?utm_source=packagist-league-configuration&utm_medium=referral&utm_campaign=readme">Get professional support for league/configuration with a Tidelift subscription</a>
	</b>
	<br>
	<sub>
		Tidelift helps make open source sustainable for maintainers while giving companies<br>assurances about security, maintenance, and licensing for their dependencies.
	</sub>
</div>

[All Contributors]: https://github.com/thephpleague/configuration/contributors
[@colinodell]: https://www.twitter.com/colinodell
[@markehalliwell]: https://www.twitter.com/markehalliwell
[Composer]: https://getcomposer.org/
[PHP League]: https://thephpleague.com
