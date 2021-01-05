<?php

// Back
Breadcrumbs::register('back.admin', function ($trail) {
    $trail->push(__('breadcrumbs.back.admin'), route('back.home'));
});

Breadcrumbs::register('back.front_home.index', function ($trail) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.front_home.index'), route('back.front_home.index'));
});

Breadcrumbs::register('back.front_home.show', function ($trail) {
    $trail->parent('back.front_home.index');
    $trail->push(__('breadcrumbs.back.front_home.show'));
});

Breadcrumbs::register('back.front_home.edit', function ($trail) {
    $trail->parent('back.front_home.index');
    $trail->push(__('breadcrumbs.back.front_home.edit'));
});

// Back Menus
Breadcrumbs::register('back.menus.index', function ($trail) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.menus.index'), route('back.menus.index'));
});

Breadcrumbs::register('back.menus.create', function ($trail) {
    $trail->parent('back.menus.index');
    $trail->push(__('breadcrumbs.back.menus.create'));
});

Breadcrumbs::register('back.menus.edit', function ($trail) {
    $trail->parent('back.menus.index');
    $trail->push(__('breadcrumbs.back.menus.edit'));
});

Breadcrumbs::register('back.governorates.index', function ($trail) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.governorates.index'), route('back.governorates.index'));
});

Breadcrumbs::register('back.governorates.create', function ($trail) {
    $trail->parent('back.governorates.index');
    $trail->push(__('breadcrumbs.back.governorates.create'));
});

Breadcrumbs::register('back.governorates.edit', function ($trail) {
    $trail->parent('back.governorates.index');
    $trail->push(__('breadcrumbs.back.governorates.edit'));
});

Breadcrumbs::register('back.countries.index', function ($trail) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.countries.index'), route('back.countries.index'));
});

Breadcrumbs::register('back.countries.create', function ($trail) {
    $trail->parent('back.countries.index');
    $trail->push(__('breadcrumbs.back.countries.create'));
});

Breadcrumbs::register('back.countries.edit', function ($trail) {
    $trail->parent('back.countries.index');
    $trail->push(__('breadcrumbs.back.countries.edit'));
});

// Partners
Breadcrumbs::register('back.partners.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.partners.index'), route('back.partners.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.partners.create', function ($trail, $menu_id) {
    $trail->parent('back.partners.index', $menu_id);
    $trail->push(__('breadcrumbs.back.partners.create'));
});

Breadcrumbs::register('back.partners.edit', function ($trail, $menu_id) {
    $trail->parent('back.partners.index', $menu_id);
    $trail->push(__('breadcrumbs.back.partners.edit'));
});

Breadcrumbs::register('back.partners.show', function ($trail, $menu_id) {
    $trail->parent('back.partners.index', $menu_id);
    $trail->push(__('breadcrumbs.back.partners.show'));
});

// Partner Categories
Breadcrumbs::register('back.partner_categories.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.partner_categories.index'), route('back.partner_categories.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.partner_categories.create', function ($trail, $menu_id) {
    $trail->parent('back.partner_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.partner_categories.create'));
});

Breadcrumbs::register('back.partner_categories.edit', function ($trail, $menu_id) {
    $trail->parent('back.partner_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.partner_categories.edit'));
});

Breadcrumbs::register('back.partner_categories.show', function ($trail, $menu_id) {
    $trail->parent('back.partner_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.partner_categories.show'));
});

// Contact messages
Breadcrumbs::register('back.contact_messages.index', function ($trail) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.contact_messages.index'), route('back.menus.index'));
});

// Contact recipients
Breadcrumbs::register('back.contact_recipients.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.contact_recipients.index'), route('back.contact_recipients.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.contact_recipients.create', function ($trail, $menu_id) {
    $trail->parent('back.contact_recipients.index', $menu_id);
    $trail->push(__('breadcrumbs.back.contact_recipients.create'));
});

Breadcrumbs::register('back.contact_recipients.edit', function ($trail, $menu_id) {
    $trail->parent('back.contact_recipients.index', $menu_id);
    $trail->push(__('breadcrumbs.back.contact_recipients.edit'));
});

Breadcrumbs::register('back.contact_recipients.show', function ($trail, $menu_id) {
    $trail->parent('back.contact_recipients.index', $menu_id);
    $trail->push(__('breadcrumbs.back.contact_recipients.show'));
});

// Documents
Breadcrumbs::register('back.files.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.files.index'), route('back.files.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.files.create', function ($trail, $menu_id) {
    $trail->parent('back.files.index', $menu_id);
    $trail->push(__('breadcrumbs.back.files.create'));
});

Breadcrumbs::register('back.files.edit', function ($trail, $menu_id) {
    $trail->parent('back.files.index', $menu_id);
    $trail->push(__('breadcrumbs.back.files.edit'));
});

Breadcrumbs::register('back.files.show', function ($trail, $menu_id) {
    $trail->parent('back.files.index', $menu_id);
    $trail->push(__('breadcrumbs.back.files.show'));
});

// Documents procedures
Breadcrumbs::register('back.procedures.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.procedures.index'), route('back.procedures.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.procedures.create', function ($trail, $menu_id) {
    $trail->parent('back.procedures.index', $menu_id);
    $trail->push(__('breadcrumbs.back.procedures.create'));
});

Breadcrumbs::register('back.procedures.edit', function ($trail, $menu_id) {
    $trail->parent('back.procedures.index', $menu_id);
    $trail->push(__('breadcrumbs.back.procedures.edit'));
});

Breadcrumbs::register('back.procedures.show', function ($trail, $menu_id) {
    $trail->parent('back.procedures.index', $menu_id);
    $trail->push(__('breadcrumbs.back.procedures.show'));
});

// procedures Categories
Breadcrumbs::register('back.procedure_categories.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.procedure_categories.index'), route('back.procedure_categories.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.procedure_categories.create', function ($trail, $menu_id) {
    $trail->parent('back.procedure_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.procedure_categories.create'));
});

Breadcrumbs::register('back.procedure_categories.edit', function ($trail, $menu_id) {
    $trail->parent('back.procedure_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.procedure_categories.edit'));
});

Breadcrumbs::register('back.procedure_categories.show', function ($trail, $menu_id) {
    $trail->parent('back.procedure_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.procedure_categories.show'));
});

// Document Categories
Breadcrumbs::register('back.file_categories.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.file_categories.index'), route('back.file_categories.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.file_categories.create', function ($trail, $menu_id) {
    $trail->parent('back.file_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.file_categories.create'));
});

Breadcrumbs::register('back.file_categories.edit', function ($trail, $menu_id) {
    $trail->parent('back.file_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.file_categories.edit'));
});

Breadcrumbs::register('back.file_categories.show', function ($trail, $menu_id) {
    $trail->parent('back.file_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.file_categories.show'));
});
// Schemas
Breadcrumbs::register('back.schemas.index', function ($trail) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.schemas.index'), route('back.schemas.index'));
});

Breadcrumbs::register('back.schemas.create', function ($trail) {
    $trail->parent('back.schemas.index');
    $trail->push(__('breadcrumbs.back.schemas.create'));
});

Breadcrumbs::register('back.schemas.edit', function ($trail) {
    $trail->parent('back.schemas.index');
    $trail->push(__('breadcrumbs.back.schemas.edit'));
});

Breadcrumbs::register('back.schemas.show', function ($trail) {
    $trail->parent('back.schemas.index');
    $trail->push(__('breadcrumbs.back.schemas.show'));
});

// plans
Breadcrumbs::register('back.plans.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.plans.index'), route('back.plans.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.plans.create', function ($trail, $menu_id) {
    $trail->parent('back.plans.index', $menu_id);
    $trail->push(__('breadcrumbs.back.files.create'));
});

Breadcrumbs::register('back.plans.edit', function ($trail, $menu_id) {
    $trail->parent('back.plans.index', $menu_id);
    $trail->push(__('breadcrumbs.back.plans.edit'));
});

Breadcrumbs::register('back.plans.show', function ($trail, $menu_id) {
    $trail->parent('back.plans.index', $menu_id);
    $trail->push(__('breadcrumbs.back.plans.show'));
});

// Module Plan Categories
Breadcrumbs::register('back.plan_categories.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.plan_categories.index'), route('back.plan_categories.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.plan_categories.create', function ($trail, $menu_id) {
    $trail->parent('back.plan_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.plan_categories.create'));
});

Breadcrumbs::register('back.plan_categories.edit', function ($trail, $menu_id) {
    $trail->parent('back.plan_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.plan_categories.edit'));
});

Breadcrumbs::register('back.plan_categories.show', function ($trail, $menu_id) {
    $trail->parent('back.plan_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.plan_categories.show'));
});

// FAQ Categories
Breadcrumbs::register('back.faq_categories.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.faq_categories.index'), route('back.faq_categories.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.faq_categories.create', function ($trail, $menu_id) {
    $trail->parent('back.faq_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.faq_categories.create'));
});

Breadcrumbs::register('back.faq_categories.edit', function ($trail, $menu_id) {
    $trail->parent('back.faq_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.faq_categories.edit'));
});

Breadcrumbs::register('back.faq_categories.show', function ($trail, $menu_id) {
    $trail->parent('back.faq_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.faq_categories.show'));
});

// FAQ
Breadcrumbs::register('back.faq_items.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.faq_items.index'), route('back.faq_items.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.faq_items.create', function ($trail, $menu_id) {
    $trail->parent('back.faq_items.index', $menu_id);
    $trail->push(__('breadcrumbs.back.faq_items.create'));
});

Breadcrumbs::register('back.faq_items.edit', function ($trail, $menu_id) {
    $trail->parent('back.faq_items.index', $menu_id);
    $trail->push(__('breadcrumbs.back.faq_items.edit'));
});

Breadcrumbs::register('back.faq_items.show', function ($trail, $menu_id) {
    $trail->parent('back.faq_items.index', $menu_id);
    $trail->push(__('breadcrumbs.back.faq_items.show'));
});

// Aspim Categories
Breadcrumbs::register('back.aspim_categories.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.aspim_categories.index'), route('back.aspim_categories.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.aspim_categories.create', function ($trail, $menu_id) {
    $trail->parent('back.aspim_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.aspim_categories.create'));
});

Breadcrumbs::register('back.aspim_categories.edit', function ($trail, $menu_id) {
    $trail->parent('back.aspim_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.aspim_categories.edit'));
});

Breadcrumbs::register('back.aspim_categories.show', function ($trail, $menu_id) {
    $trail->parent('back.aspim_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.aspim_categories.show'));
});

// Aspim
Breadcrumbs::register('back.aspims.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.aspims.index'), route('back.aspims.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.aspims.create', function ($trail, $menu_id) {
    $trail->parent('back.aspims.index', $menu_id);
    $trail->push(__('breadcrumbs.back.aspims.create'));
});

Breadcrumbs::register('back.aspims.edit', function ($trail, $menu_id) {
    $trail->parent('back.aspims.index', $menu_id);
    $trail->push(__('breadcrumbs.back.aspims.edit'));
});

Breadcrumbs::register('back.aspims.show', function ($trail, $menu_id) {
    $trail->parent('back.aspims.index', $menu_id);
    $trail->push(__('breadcrumbs.back.aspims.show'));
});
// Gestionnaire aspim
Breadcrumbs::register('back.gestionnaire_aspim.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.gestionnaire_aspim.index'), route('back.gestionnaire_aspim.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.gestionnaire_aspim.create', function ($trail, $menu_id) {
    $trail->parent('back.gestionnaire_aspim.index', $menu_id);
    $trail->push(__('breadcrumbs.back.gestionnaire_aspim.create'));
});

Breadcrumbs::register('back.gestionnaire_aspim.edit', function ($trail, $menu_id) {
    $trail->parent('back.gestionnaire_aspim.index', $menu_id);
    $trail->push(__('breadcrumbs.back.gestionnaire_aspim.edit'));
});

Breadcrumbs::register('back.gestionnaire_aspim.show', function ($trail, $menu_id) {
    $trail->parent('back.gestionnaire_aspim.index', $menu_id);
    $trail->push(__('breadcrumbs.back.aspims.show'));
});
// Event Categories
Breadcrumbs::register('back.event_categories.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.event_categories.index'), route('back.event_categories.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.event_categories.create', function ($trail, $menu_id) {
    $trail->parent('back.event_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.event_categories.create'));
});

Breadcrumbs::register('back.event_categories.edit', function ($trail, $menu_id) {
    $trail->parent('back.event_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.event_categories.edit'));
});

Breadcrumbs::register('back.event_categories.show', function ($trail, $menu_id) {
    $trail->parent('back.event_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.event_categories.show'));
});

// Event
Breadcrumbs::register('back.events.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.events.index'), route('back.events.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.events.create', function ($trail, $menu_id) {
    $trail->parent('back.events.index', $menu_id);
    $trail->push(__('breadcrumbs.back.events.create'));
});

Breadcrumbs::register('back.events.edit', function ($trail, $menu_id) {
    $trail->parent('back.events.index', $menu_id);
    $trail->push(__('breadcrumbs.back.events.edit'));
});

Breadcrumbs::register('back.events.show', function ($trail, $menu_id) {
    $trail->parent('back.events.index', $menu_id);
    $trail->push(__('breadcrumbs.back.events.show'));
});

// Gestion Forums
Breadcrumbs::register('back.gestion_forums.index', function ($trail) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.gestion_forums.index'), route('back.gestion_forums.index'));
});

Breadcrumbs::register('back.gestion_forums.create', function ($trail) {
    $trail->parent('back.gestion_forums.index');
    $trail->push(__('breadcrumbs.back.gestion_forums.create'));
});

Breadcrumbs::register('back.gestion_forums.edit', function ($trail) {
    $trail->parent('back.gestion_forums.index');
    $trail->push(__('breadcrumbs.back.gestion_forums.edit'));
});

Breadcrumbs::register('back.gestion_forums.show', function ($trail) {
    $trail->parent('back.gestion_forums.index');
    $trail->push(__('breadcrumbs.back.gestion_forums.show'));
});

// Category Forums
Breadcrumbs::register('back.category_forums.index', function ($trail) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.category_forums.index'), route('back.category_forums.index'));
});

Breadcrumbs::register('back.category_forums.create', function ($trail) {
    $trail->parent('back.category_forums.index');
    $trail->push(__('breadcrumbs.back.category_forums.create'));
});

Breadcrumbs::register('back.category_forums.edit', function ($trail) {
    $trail->parent('back.category_forums.index');
    $trail->push(__('breadcrumbs.back.category_forums.edit'));
});

Breadcrumbs::register('back.category_forums.show', function ($trail) {
    $trail->parent('back.category_forums.index');
    $trail->push(__('breadcrumbs.back.category_forums.show'));
});

// Training Categories
Breadcrumbs::register('back.training_categories.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.training_categories.index'), route('back.training_categories.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.training_categories.create', function ($trail, $menu_id) {
    $trail->parent('back.training_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.training_categories.create'));
});

Breadcrumbs::register('back.training_categories.edit', function ($trail, $menu_id) {
    $trail->parent('back.training_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.training_categories.edit'));
});

Breadcrumbs::register('back.training_categories.show', function ($trail, $menu_id) {
    $trail->parent('back.training_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.training_categories.show'));
});

// Training
Breadcrumbs::register('back.trainings.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.trainings.index'), route('back.trainings.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.trainings.create', function ($trail, $menu_id) {
    $trail->parent('back.trainings.index', $menu_id);
    $trail->push(__('breadcrumbs.back.trainings.create'));
});

Breadcrumbs::register('back.trainings.edit', function ($trail, $menu_id) {
    $trail->parent('back.trainings.index', $menu_id);
    $trail->push(__('breadcrumbs.back.trainings.edit'));
});

Breadcrumbs::register('back.trainings.show', function ($trail, $menu_id) {
    $trail->parent('back.trainings.index', $menu_id);
    $trail->push(__('breadcrumbs.back.trainings.show'));
});

// News Categories
Breadcrumbs::register('back.news_categories.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.news_categories.index'), route('back.news_categories.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.news_categories.create', function ($trail, $menu_id) {
    $trail->parent('back.news_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.news_categories.create'));
});

Breadcrumbs::register('back.news_categories.edit', function ($trail, $menu_id) {
    $trail->parent('back.news_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.news_categories.edit'));
});

Breadcrumbs::register('back.news_categories.show', function ($trail, $menu_id) {
    $trail->parent('back.news_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.news_categories.show'));
});

// News
Breadcrumbs::register('back.news.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.news.index'), route('back.news.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.news.create', function ($trail, $menu_id) {
    $trail->parent('back.news.index', $menu_id);
    $trail->push(__('breadcrumbs.back.news.create'));
});

Breadcrumbs::register('back.news.edit', function ($trail, $menu_id) {
    $trail->parent('back.news.index', $menu_id);
    $trail->push(__('breadcrumbs.back.news.edit'));
});

Breadcrumbs::register('back.news.show', function ($trail, $menu_id) {
    $trail->parent('back.news.index', $menu_id);
    $trail->push(__('breadcrumbs.back.news.show'));
});

// Widgets
Breadcrumbs::register('back.widgets.index', function ($trail) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.widgets.index'), route('back.widgets.index'));
});

Breadcrumbs::register('back.widgets.create', function ($trail) {
    $trail->parent('back.widgets.index');
    $trail->push(__('breadcrumbs.back.widgets.create'));
});

Breadcrumbs::register('back.widgets.edit', function ($trail) {
    $trail->parent('back.widgets.index');
    $trail->push(__('breadcrumbs.back.widgets.edit'));
});

Breadcrumbs::register('back.widgets.show', function ($trail) {
    $trail->parent('back.widgets.index');
    $trail->push(__('breadcrumbs.back.widgets.show'));
});

// Banners
Breadcrumbs::register('back.banners.index', function ($trail) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.banners.index'), route('back.banners.index'));
});

Breadcrumbs::register('back.banners.create', function ($trail) {
    $trail->parent('back.banners.index');
    $trail->push(__('breadcrumbs.back.banners.create'));
});

Breadcrumbs::register('back.banners.edit', function ($trail) {
    $trail->parent('back.banners.index');
    $trail->push(__('breadcrumbs.back.banners.edit'));
});

Breadcrumbs::register('back.banners.show', function ($trail) {
    $trail->parent('back.banners.index');
    $trail->push(__('breadcrumbs.back.banners.show'));
});

// Useful links
Breadcrumbs::register('back.useful_links.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.useful_links.index'), route('back.useful_links.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.useful_links.create', function ($trail, $menu_id) {
    $trail->parent('back.useful_links.index', $menu_id);
    $trail->push(__('breadcrumbs.back.useful_links.create'));
});

Breadcrumbs::register('back.useful_links.edit', function ($trail, $menu_id) {
    $trail->parent('back.useful_links.index', $menu_id);
    $trail->push(__('breadcrumbs.back.useful_links.edit'));
});

Breadcrumbs::register('back.useful_links.show', function ($trail, $menu_id) {
    $trail->parent('back.useful_links.index', $menu_id);
    $trail->push(__('breadcrumbs.back.useful_links.show'));
});

// Useful link Categories
Breadcrumbs::register('back.useful_link_categories.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.useful_link_categories.index'), route('back.useful_link_categories.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.useful_link_categories.create', function ($trail, $menu_id) {
    $trail->parent('back.useful_link_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.useful_link_categories.create'));
});

Breadcrumbs::register('back.useful_link_categories.edit', function ($trail, $menu_id) {
    $trail->parent('back.useful_link_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.useful_link_categories.edit'));
});

Breadcrumbs::register('back.useful_link_categories.show', function ($trail, $menu_id) {
    $trail->parent('back.useful_link_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.useful_link_categories.show'));
});

// Media album Categories
Breadcrumbs::register('back.media_album_categories.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.media_album_categories.index'), route('back.media_album_categories.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.media_album_categories.create', function ($trail, $menu_id) {
    $trail->parent('back.media_album_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.media_album_categories.create'));
});

Breadcrumbs::register('back.media_album_categories.edit', function ($trail, $menu_id) {
    $trail->parent('back.media_album_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.media_album_categories.edit'));
});

Breadcrumbs::register('back.media_album_categories.show', function ($trail, $menu_id) {
    $trail->parent('back.media_album_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.media_album_categories.show'));
});

// Media album Categories
Breadcrumbs::register('back.media_albums.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.media_albums.index'), route('back.media_albums.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.media_albums.create', function ($trail, $menu_id) {
    $trail->parent('back.media_albums.index', $menu_id);
    $trail->push(__('breadcrumbs.back.media_albums.create'));
});

Breadcrumbs::register('back.media_albums.edit', function ($trail, $menu_id) {
    $trail->parent('back.media_albums.index', $menu_id);
    $trail->push(__('breadcrumbs.back.media_albums.edit'));
});

Breadcrumbs::register('back.media_albums.show', function ($trail, $menu_id) {
    $trail->parent('back.media_albums.index', $menu_id);
    $trail->push(__('breadcrumbs.back.media_albums.show'));
});

// Media file
Breadcrumbs::register('back.media_files.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.media_files.index'), route('back.media_files.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.media_files.create', function ($trail, $menu_id) {
    $trail->parent('back.media_files.index', $menu_id);
    $trail->push(__('breadcrumbs.back.media_files.create'));
});

Breadcrumbs::register('back.media_files.edit', function ($trail, $menu_id) {
    $trail->parent('back.media_files.index', $menu_id);
    $trail->push(__('breadcrumbs.back.media_files.edit'));
});

Breadcrumbs::register('back.media_files.show', function ($trail, $menu_id) {
    $trail->parent('back.media_files.index', $menu_id);
    $trail->push(__('breadcrumbs.back.media_files.show'));
});

// Testimonials
Breadcrumbs::register('back.testimonials.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.testimonials.index'), route('back.testimonials.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.testimonials.create', function ($trail, $menu_id) {
    $trail->parent('back.testimonials.index', $menu_id);
    $trail->push(__('breadcrumbs.back.testimonials.create'));
});

Breadcrumbs::register('back.testimonials.edit', function ($trail, $menu_id) {
    $trail->parent('back.testimonials.index', $menu_id);
    $trail->push(__('breadcrumbs.back.testimonials.edit'));
});

Breadcrumbs::register('back.testimonials.show', function ($trail, $menu_id) {
    $trail->parent('back.testimonials.index', $menu_id);
    $trail->push(__('breadcrumbs.back.testimonials.show'));
});

// Testimonial Categories
Breadcrumbs::register('back.testimonial_categories.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.testimonial_categories.index'), route('back.testimonial_categories.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.testimonial_categories.create', function ($trail, $menu_id) {
    $trail->parent('back.testimonial_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.testimonial_categories.create'));
});

Breadcrumbs::register('back.testimonial_categories.edit', function ($trail, $menu_id) {
    $trail->parent('back.testimonial_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.testimonial_categories.edit'));
});

Breadcrumbs::register('back.testimonial_categories.show', function ($trail, $menu_id) {
    $trail->parent('back.testimonial_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.testimonial_categories.show'));
});

// Sitemaps
Breadcrumbs::register('back.sitemaps.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.sitemaps.index'), route('back.sitemaps.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.sitemaps.create', function ($trail, $menu_id) {
    $trail->parent('back.sitemaps.index', $menu_id);
    $trail->push(__('breadcrumbs.back.sitemaps.create'));
});

Breadcrumbs::register('back.sitemaps.edit', function ($trail, $menu_id) {
    $trail->parent('back.sitemaps.index', $menu_id);
    $trail->push(__('breadcrumbs.back.sitemaps.edit'));
});

Breadcrumbs::register('back.sitemaps.show', function ($trail, $menu_id) {
    $trail->parent('back.sitemaps.index', $menu_id);
    $trail->push(__('breadcrumbs.back.sitemaps.show'));
});

// Categories Outil de gestion
Breadcrumbs::register('back.outil_gestion_categories.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.outil_gestion_categories.index'), route('back.outil_gestion_categories.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.outil_gestion_categories.create', function ($trail, $menu_id) {
    $trail->parent('back.outil_gestion_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.outil_gestion_categories.create'));
});

Breadcrumbs::register('back.outil_gestion_categories.edit', function ($trail, $menu_id) {
    $trail->parent('back.outil_gestion_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.outil_gestion_categories.edit'));
});

Breadcrumbs::register('back.outil_gestion_categories.show', function ($trail, $menu_id) {
    $trail->parent('back.outil_gestion_categories.index', $menu_id);
    $trail->push(__('breadcrumbs.back.outil_gestion_categories.show'));
});

// Outil de gestion
Breadcrumbs::register('back.outil_gestions.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.outil_gestions.index'), route('back.outil_gestions.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.outil_gestions.create', function ($trail, $menu_id) {
    $trail->parent('back.outil_gestions.index', $menu_id);
    $trail->push(__('breadcrumbs.back.outil_gestions.create'));
});

Breadcrumbs::register('back.outil_gestions.edit', function ($trail, $menu_id) {
    $trail->parent('back.outil_gestions.index', $menu_id);
    $trail->push(__('breadcrumbs.back.outil_gestions.edit'));
});

Breadcrumbs::register('back.outil_gestions.show', function ($trail, $menu_id) {
    $trail->parent('back.outil_gestions.index', $menu_id);
    $trail->push(__('breadcrumbs.back.outil_gestions.show'));
});

// Programs
Breadcrumbs::register('back.programs.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.programs.index'), route('back.programs.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.programs.create', function ($trail, $menu_id) {
    $trail->parent('back.programs.index', $menu_id);
    $trail->push(__('breadcrumbs.back.programs.create'));
});

Breadcrumbs::register('back.programs.edit', function ($trail, $menu_id) {
    $trail->parent('back.programs.index', $menu_id);
    $trail->push(__('breadcrumbs.back.programs.edit'));
});

Breadcrumbs::register('back.programs.show', function ($trail, $menu_id) {
    $trail->parent('back.programs.index', $menu_id);
    $trail->push(__('breadcrumbs.back.programs.show'));
});

// Map layers
Breadcrumbs::register('back.map_layers.index', function ($trail, $menu_id) {
    $trail->parent('back.admin');
    $trail->push(__('breadcrumbs.back.map_layers.index'), route('back.map_layers.index', ['menu_id' => $menu_id]));
});

Breadcrumbs::register('back.map_layers.create', function ($trail, $menu_id) {
    $trail->parent('back.map_layers.index', $menu_id);
    $trail->push(__('breadcrumbs.back.map_layers.create'));
});

Breadcrumbs::register('back.map_layers.edit', function ($trail, $menu_id) {
    $trail->parent('back.map_layers.index', $menu_id);
    $trail->push(__('breadcrumbs.back.map_layers.edit'));
});

Breadcrumbs::register('back.map_layers.show', function ($trail, $menu_id) {
    $trail->parent('back.map_layers.index', $menu_id);
    $trail->push(__('breadcrumbs.back.map_layers.show'));
});
