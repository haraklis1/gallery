<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/demo')) {
            if (0 === strpos($pathinfo, '/demo/secured')) {
                if (0 === strpos($pathinfo, '/demo/secured/log')) {
                    if (0 === strpos($pathinfo, '/demo/secured/login')) {
                        // _demo_login
                        if ($pathinfo === '/demo/secured/login') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                        }

                        // _security_check
                        if ($pathinfo === '/demo/secured/login_check') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_security_check',);
                        }

                    }

                    // _demo_logout
                    if ($pathinfo === '/demo/secured/logout') {
                        return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
                    }

                }

                if (0 === strpos($pathinfo, '/demo/secured/hello')) {
                    // acme_demo_secured_hello
                    if ($pathinfo === '/demo/secured/hello') {
                        return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
                    }

                    // _demo_secured_hello
                    if (preg_match('#^/demo/secured/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',));
                    }

                    // _demo_secured_hello_admin
                    if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello_admin')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',));
                    }

                }

            }

            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }

            }

            if (0 === strpos($pathinfo, '/logout')) {
                // fos_user_security_logout
                if ($pathinfo === '/logout') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
                }

                // user_logout
                if ($pathinfo === '/logout') {
                    return array('_route' => 'user_logout');
                }

            }

            // user_login
            if ($pathinfo === '/login') {
                return array('_route' => 'user_login');
            }

        }

        // awesomeirko_gallery_homepage
        if ($pathinfo === '/home') {
            return array (  '_controller' => 'Awesomeirko\\GalleryBundle\\Controller\\DefaultController::indexAction',  '_route' => 'awesomeirko_gallery_homepage',);
        }

        if (0 === strpos($pathinfo, '/Admin/Album')) {
            // awesomeirko_gallery_album_edit
            if (0 === strpos($pathinfo, '/Admin/Album/Edit') && preg_match('#^/Admin/Album/Edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'awesomeirko_gallery_album_edit')), array (  '_controller' => 'AwesomeirkoGalleryBundle:Album:Edit',));
            }

            // awesomeirko_gallery_album_create
            if ($pathinfo === '/Admin/Album/Create') {
                return array (  '_controller' => 'AwesomeirkoGalleryBundle:Album:Create',  '_route' => 'awesomeirko_gallery_album_create',);
            }

            // awesomeirko_gallery_album_delete
            if (0 === strpos($pathinfo, '/Admin/Album/Delete') && preg_match('#^/Admin/Album/Delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'awesomeirko_gallery_album_delete')), array (  '_controller' => 'AwesomeirkoGalleryBundle:Album:Delete',));
            }

        }

        // albums
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'albums');
            }

            return array (  '_controller' => 'Awesomeirko\\GalleryBundle\\Controller\\AlbumsController::indexAction',  '_route' => 'albums',);
        }

        if (0 === strpos($pathinfo, '/A')) {
            // albums_show
            if (0 === strpos($pathinfo, '/Albums') && preg_match('#^/Albums/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'albums_show')), array (  '_controller' => 'Awesomeirko\\GalleryBundle\\Controller\\AlbumsController::showAction',));
            }

            if (0 === strpos($pathinfo, '/Admin/Albums')) {
                // albums_new
                if ($pathinfo === '/Admin/Albums/New') {
                    return array (  '_controller' => 'Awesomeirko\\GalleryBundle\\Controller\\AlbumsController::newAction',  '_route' => 'albums_new',);
                }

                // albums_create
                if ($pathinfo === '/Admin/Albums/Create') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_albums_create;
                    }

                    return array (  '_controller' => 'Awesomeirko\\GalleryBundle\\Controller\\AlbumsController::createAction',  '_route' => 'albums_create',);
                }
                not_albums_create:

                // albums_edit
                if (0 === strpos($pathinfo, '/Admin/Albums/Edit') && preg_match('#^/Admin/Albums/Edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'albums_edit')), array (  '_controller' => 'Awesomeirko\\GalleryBundle\\Controller\\AlbumsController::editAction',));
                }

                // albums_update
                if (0 === strpos($pathinfo, '/Admin/Albums/Update') && preg_match('#^/Admin/Albums/Update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                        $allow = array_merge($allow, array('POST', 'PUT'));
                        goto not_albums_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'albums_update')), array (  '_controller' => 'Awesomeirko\\GalleryBundle\\Controller\\AlbumsController::updateAction',));
                }
                not_albums_update:

                // albums_delete
                if (0 === strpos($pathinfo, '/Admin/Albums/Delete') && preg_match('#^/Admin/Albums/Delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                        $allow = array_merge($allow, array('POST', 'DELETE'));
                        goto not_albums_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'albums_delete')), array (  '_controller' => 'Awesomeirko\\GalleryBundle\\Controller\\AlbumsController::deleteAction',));
                }
                not_albums_delete:

            }

        }

        // photos
        if (0 === strpos($pathinfo, '/Photos') && preg_match('#^/Photos/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'photos')), array (  '_controller' => 'Awesomeirko\\GalleryBundle\\Controller\\PhotosController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/Admin/Photos')) {
            // photos_show
            if (0 === strpos($pathinfo, '/Admin/Photos/Show') && preg_match('#^/Admin/Photos/Show/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'photos_show')), array (  '_controller' => 'Awesomeirko\\GalleryBundle\\Controller\\PhotosController::showAction',));
            }

            // photos_new
            if (0 === strpos($pathinfo, '/Admin/Photos/New') && preg_match('#^/Admin/Photos/New/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'photos_new')), array (  '_controller' => 'Awesomeirko\\GalleryBundle\\Controller\\PhotosController::newAction',));
            }

            // photos_create
            if ($pathinfo === '/Admin/Photos/Create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_photos_create;
                }

                return array (  '_controller' => 'Awesomeirko\\GalleryBundle\\Controller\\PhotosController::createAction',  '_route' => 'photos_create',);
            }
            not_photos_create:

            // photos_edit
            if (0 === strpos($pathinfo, '/Admin/Photos/Edit') && preg_match('#^/Admin/Photos/Edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'photos_edit')), array (  '_controller' => 'Awesomeirko\\GalleryBundle\\Controller\\PhotosController::editAction',));
            }

            // photos_update
            if (0 === strpos($pathinfo, '/Admin/Photos/Update') && preg_match('#^/Admin/Photos/Update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_photos_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'photos_update')), array (  '_controller' => 'Awesomeirko\\GalleryBundle\\Controller\\PhotosController::updateAction',));
            }
            not_photos_update:

            // photos_delete
            if (0 === strpos($pathinfo, '/Admin/Photos/Delete') && preg_match('#^/Admin/Photos/Delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_photos_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'photos_delete')), array (  '_controller' => 'Awesomeirko\\GalleryBundle\\Controller\\PhotosController::deleteAction',));
            }
            not_photos_delete:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
