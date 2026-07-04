<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents language codes for the HTML `lang` global attribute.
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/lang
 * @see https://tools.ietf.org/html/bcp47
 */
enum Language: string
{
    /**
     * Arabic language code (`ar`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=ar
     */
    case ARABIC = 'ar';

    /**
     * Bengali language code (`bn`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=bn
     */
    case BENGALI = 'bn';

    /**
     * Bulgarian language code (`bg`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=bg
     */
    case BULGARIAN = 'bg';

    /**
     * Catalan language code (`ca`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=ca
     */
    case CATALAN = 'ca';

    /**
     * Chinese language code (`zh`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=zh
     */
    case CHINESE = 'zh';

    /**
     * Chinese Simplified language code (`zh-CN`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=zh
     */
    case CHINESE_SIMPLIFIED = 'zh-CN';

    /**
     * Chinese Traditional language code (`zh-TW`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=zh
     */
    case CHINESE_TRADITIONAL = 'zh-TW';

    /**
     * Croatian language code (`hr`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=hr
     */
    case CROATIAN = 'hr';

    /**
     * Czech language code (`cs`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=cs
     */
    case CZECH = 'cs';

    /**
     * Danish language code (`da`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=da
     */
    case DANISH = 'da';

    /**
     * Dutch language code (`nl`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=nl
     */
    case DUTCH = 'nl';

    /**
     * English language code (`en`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=en
     */
    case ENGLISH = 'en';

    /**
     * English (UK) language code (`en-GB`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=en
     */
    case ENGLISH_UK = 'en-GB';

    /**
     * English (US) language code (`en-US`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=en
     */
    case ENGLISH_US = 'en-US';

    /**
     * Estonian language code (`et`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=et
     */
    case ESTONIAN = 'et';

    /**
     * Finnish language code (`fi`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=fi
     */
    case FINNISH = 'fi';

    /**
     * French language code (`fr`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=fr
     */
    case FRENCH = 'fr';

    /**
     * German language code (`de`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=de
     */
    case GERMAN = 'de';

    /**
     * Greek language code (`el`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=el
     */
    case GREEK = 'el';

    /**
     * Hebrew language code (`he`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=he
     */
    case HEBREW = 'he';

    /**
     * Hindi language code (`hi`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=hi
     */
    case HINDI = 'hi';

    /**
     * Hungarian language code (`hu`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=hu
     */
    case HUNGARIAN = 'hu';

    /**
     * Indonesian language code (`id`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=id
     */
    case INDONESIAN = 'id';

    /**
     * Italian language code (`it`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=it
     */
    case ITALIAN = 'it';

    /**
     * Japanese language code (`ja`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=ja
     */
    case JAPANESE = 'ja';

    /**
     * Korean language code (`ko`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=ko
     */
    case KOREAN = 'ko';

    /**
     * Latvian language code (`lv`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=lv
     */
    case LATVIAN = 'lv';

    /**
     * Lithuanian language code (`lt`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=lt
     */
    case LITHUANIAN = 'lt';

    /**
     * Norwegian language code (`no`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=no
     */
    case NORWEGIAN = 'no';

    /**
     * Polish language code (`pl`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=pl
     */
    case POLISH = 'pl';

    /**
     * Portuguese language code (`pt`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=pt
     */
    case PORTUGUESE = 'pt';

    /**
     * Portuguese (Brazil) language code (`pt-BR`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=pt
     */
    case PORTUGUESE_BRAZIL = 'pt-BR';

    /**
     * Romanian language code (`ro`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=ro
     */
    case ROMANIAN = 'ro';

    /**
     * Russian language code (`ru`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=ru
     */
    case RUSSIAN = 'ru';

    /**
     * Serbian language code (`sr`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=sr
     */
    case SERBIAN = 'sr';

    /**
     * Slovak language code (`sk`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=sk
     */
    case SLOVAK = 'sk';

    /**
     * Slovenian language code (`sl`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=sl
     */
    case SLOVENIAN = 'sl';

    /**
     * Spanish language code (`es`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=es
     */
    case SPANISH = 'es';

    /**
     * Spanish (Latin America/Caribbean) language code (`es-419`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=es
     */
    case SPANISH_LATIN_AMERICA = 'es-419';

    /**
     * Spanish (Spain) language code (`es-ES`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=es
     */
    case SPANISH_SPAIN = 'es-ES';

    /**
     * Swedish language code (`sv`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=sv
     */
    case SWEDISH = 'sv';

    /**
     * Thai language code (`th`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=th
     */
    case THAI = 'th';

    /**
     * Turkish language code (`tr`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=tr
     */
    case TURKISH = 'tr';

    /**
     * Ukrainian language code (`uk`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=uk
     */
    case UKRAINIAN = 'uk';

    /**
     * Vietnamese language code (`vi`).
     *
     * @see https://www.loc.gov/standards/iso639-2/php/langcodes_name.php?lang_code=vi
     */
    case VIETNAMESE = 'vi';
}
