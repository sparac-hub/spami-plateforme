
#Cache System:

 * **Parameters**:
   * Source: ***parameters*** table.
   * Check */app/Helpers/CacheHelpers.php*.
   * Parameters cache is removed whenever we update 'parameters' table.

 * **Menus**:
   * source: ***menus*** table.


# Features
  * Google Analytics integration :
    * Two diffirent tracking codes : front (public) and back (admin)
  * Auto redirect for misspelled url with slugs (CMS Pages module)
    * example: www.cms-laravel.test/page/axampl-submmmmenu-27 to www.cms-laravel.test/page/example-submenu-27
      * PS: The slug is registered on the ***menu_translations*** table.

# Todo list
       * Check todo.md in this directory *


# Building Frontal Menus

 * Menus are created via ***generate_menu($menu_group_reference)*** inside ***app/Helpers/MenusHelpers.php*** as follow:
   * Get all menus that belong to a given group (Main menu, footer Menu..etc):
     * $menu_rows = get_cached_menus($menu_group_reference);
   * Build menu tree :
     * $menu_tree_array = buildTree($menu_rows->toArray(), $parentId = null);
     * While building the tree, we'll generate URL for each item via method:
       * generate_menu_url($element);

# Custom HTTP error pages:
 * There are custom HTTP error pages under: ***resources/views/errors/***
   * HTTP errors: 403, 404, 419, 429, 500, 503
 * Translation messages: ***resources/lang/{locale}/error_page.php***


# Redirection:
 * Redirect: www.website.com to www.website.com/{locale}  ({locale} : fr, en, ar, es ...)
 * Redirection is made via middleware: ***app\Http\Middleware\RedirectLocale.php***


