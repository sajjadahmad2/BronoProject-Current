@php
                        $scopes = implode(' ', [
                            'businesses.readonly',
                            'businesses.write',
                            'companies.readonly',
                            'calendars.readonly',
                            'calendars.write',
                            'calendars/events.readonly',
                            'calendars/events.write',
                            'calendars/groups.readonly',
                            'calendars/groups.write',
                            'calendars/resources.readonly',
                            'calendars/resources.write',
                            'campaigns.readonly',
                            'conversations.readonly',
                            'conversations.write',
                            'conversations/message.readonly',
                            'conversations/message.write',
                            'conversations/reports.readonly',
                            'contacts.readonly',
                            'contacts.write',
                            'courses.write',
                            'courses.readonly',
                            'forms.readonly',
                            'forms.write',
                            'invoices.readonly',
                            'invoices.write',
                            'invoices/schedule.readonly',
                            'invoices/schedule.write',
                            'invoices/template.readonly',
                            'invoices/template.write',
                            'links.readonly',
                            'lc-email.readonly',
                            'links.write',
                            'locations.write',
                            'locations.readonly',
                            'locations/customValues.readonly',
                            'locations/customValues.write',
                            'locations/tasks.readonly',
                            'locations/customFields.write',
                            'locations/customFields.readonly',
                            'locations/tasks.write',
                            'locations/tags.readonly',
                            'locations/tags.write',
                            'locations/templates.readonly',
                            'medias.write',
                            'medias.readonly',
                            'funnels/redirect.readonly',
                            'funnels/page.readonly',
                            'funnels/funnel.readonly',
                            'funnels/redirect.write',
                            'oauth.write',
                            'oauth.readonly',
                            'opportunities.readonly',
                            'payments/orders.readonly',
                            'opportunities.write',
                            'payments/orders.write',
                            'payments/integration.readonly',
                            'payments/integration.write',
                            'payments/transactions.readonly',
                            'payments/subscriptions.readonly',
                            'payments/custom-provider.readonly',
                            'payments/custom-provider.write',
                            'products.readonly',
                            'products.write',
                            'products/prices.readonly',
                            'products/prices.write',
                            'saas/company.read',
                            'saas/company.write',
                            'saas/location.read',
                            'saas/location.write',
                            'socialplanner/oauth.write',
                            'socialplanner/post.readonly',
                            'socialplanner/post.write',
                            'socialplanner/account.readonly',
                            'socialplanner/account.write',
                            'socialplanner/csv.readonly',
                            'socialplanner/csv.write',
                            'socialplanner/category.readonly',
                            'socialplanner/tag.readonly',
                            'surveys.readonly',
                            'users.readonly',
                            'users.write',
                            'workflows.readonly',
                        ]);
                        $href = 'https://marketplace.gohighlevel.com/oauth/chooselocation?response_type=code&redirect_uri='
                            . route('authorization.gohighlevel.callback')
                            . '&client_id=668eb5cf0291d90e9f353acf-lyg20chd'
                            . '&scope=' . urlencode($scopes);$description = 'Connect to GoHighLevel';

                        if (is_connected()) {
                            //$description = 'Location: '.  auth()->user()->crm->location_id ?? '';
                            $description = 'GHL Connected ';
                        }else{
                            $description = 'Connect GHL';
                        }
                    @endphp
                    <a href="{{ $href }}" class="d-flex flex-column flex-center text-center text-gray-800 text-hover-primary bg-hover-light rounded py-4 px-3 mb-3">
                        <img src="{{ asset('ghl_icon.jpeg') }}" alt="Logo" class="w-25px h-25px mb-2" />
                        <span class="fw-semibold">{{ $description }}</span>
                    </a>

