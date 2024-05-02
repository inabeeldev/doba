@extends('shop.app')

@section('content')
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                    <span>Privacy Policy</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section End -->

<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Policy List -->
                <ul class="list-group">
                    <li class="list-group-item policy-link" data-toggle="modal" data-target="#generalPolicyModal">General Privacy Policy</li>
                    <li class="list-group-item policy-link" data-toggle="modal" data-target="#returnPolicyModal">Return Policy</li>
                    <li class="list-group-item policy-link" data-toggle="modal" data-target="#shippingPolicyModal">Shipping Policy</li>
                </ul>
            </div>
        </div>

        <!-- General Policy Modal -->
        <div class="modal fade" id="generalPolicyModal" tabindex="-1" role="dialog" aria-labelledby="generalPolicyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="generalPolicyModalLabel">General Privacy Policy</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="privacy-policy">
                            <h2>Nature Checkout (Property of Nature Checkout Inc) Privacy Policy</h2>
                            <h3>Privacy policy</h3>
                            <p>The following privacy policy govern all use of the naturecheckout.com website and all content, services, and products available through the website, including, but not limited to, the client area (collectively referred to as the Site).</p>
                            <p>The Site is owned and operated by Nature Checkout Inc. The Site is offered subject to your acceptance without modification of all the terms contained herein and all other operating rules, policies (including, without limitation, Nature Checkout's Privacy Policy) and procedures that may be published from time to time on this Site by Nature Checkout (collectively, the "Agreement").</p>
                            <!-- Insert the rest of the privacy policy content here -->
                            <p>Please read this Agreement carefully before accessing or using the Site. By accessing or using any part of the web site, you agree to become bound by the terms of this agreement. If you do not agree to all the terms and conditions of this agreement, then you may not access the Site or use any services. If these terms and conditions are considered an offer by Nature Checkout, acceptance is expressly limited to these terms. Nature Checkout is available to individuals of all ages provided they are a part of a family.</p>
                            <p><strong>Contribution to website</strong></p>
                            <p>If you leave comments anywhere on the Site, post material to the Site, post links on the Site, or otherwise make (or allow any third party to make) material available by means of the Site (any such material, "Content"), You are entirely responsible for the content of, and any harm resulting from, that Content. That is the case regardless of whether the Content in question constitutes text, graphics, audio, or computer software. By making Content available, you represent and warrant that:</p>
                            <!-- Include the remaining privacy policy content as provided -->
                            <p>Downloading, copying and use of the Content will not infringe the proprietary rights, including but not limited to the copyright, patent, trademark or trade secret rights, of any third party</p>
                            <p>You have fully complied with any third-party licenses relating to the Content, and have done all things necessary to successfully pass through to end users any required terms</p>
                            <p>The Content does not contain or install any viruses, worms, malware, trojan horses or other harmful or destructive content</p>
                            <p>The Content is not spam, is not machine or randomly generated, and does not contain unethical or unwanted commercial content designed to drive traffic to third party sites or boost the search engine rankings of third party sites, or to further unlawful acts (such as phishing) or mislead recipients as to the source of the material (such as spoofing)</p>
                            <p>The Content is not pornographic, libelous or defamatory, does not contain threats or incite violence towards individuals or entities, and does not violate the privacy or publicity rights of any third party</p>
                            <p>By submitting Content to Nature Checkout for inclusion on our Site, you grant Nature Checkout. a world-wide, royalty-free, and non-exclusive license to reproduce, modify, adapt and publish the Content for the purpose of displaying, distributing, promoting, marketing or any other lawful use.</p>
                            <p>Without limiting any of those representations or warranties, Nature Checkout has the right (though not the obligation) to, in Nature Checkout's sole discretion (i) refuse or remove any content that, in Nature Checkout's reasonable opinion, violates any policy or is in any way harmful or objectionable, or (ii) terminate or deny access to and use of the Site to any individual or entity for any reason, in Nature Checkout's sole discretion. Nature Checkout will have no obligation to provide a refund of any amounts previously paid under these circumstances.</p>


                            <p><strong>What information do we collect?</strong></p>
                            <p>We may collect personally identifiable information from you in a variety of ways, including through online forms for ordering products and services, and other instances where you are invited to volunteer such information, including, but not limited to, when you register on our site, place an order or subscribe to our newsletter. When ordering or registering on our site, as appropriate, you may be asked to enter your name, e-mail address, mailing address, phone number or credit card information.</p>


                            <p><strong>What do we use your information for?</strong></p>
                            <p>Any of the information we collect from you may be used to personalize your experience, improve our website, improve customer service, process transactions, send periodic emails. The email address you provide for order processing, will only be used to send you information and updates pertaining to your order. If you decide to opt-in to our mailing list, you will receive emails that may include company news, updates, related product or service information, etc. If at any time you would like to unsubscribe from receiving future emails, we include detailed unsubscribe instructions at the bottom of each email.</p>


                            <p><strong>How do we protect your information?</strong></p>
                            <p>We implement a variety of security measures to maintain the safety of your personal information when you place an order or access your personal information.</p>
                            <p>We offer the use of a secure server. All supplied sensitive/credit information is transmitted via Secure Socket Layer (SSL) technology and then encrypted into our payment gateway providers database only to be accessible by those authorized with special access rights to such systems, and are required to keep the information confidential. After a transaction, your private information (credit cards, social security numbers, financials, etc.) will not be stored on our servers.</p>



                            <p><strong>Payments and refunds</strong></p>
                            <p>The Site offers products and services for sale. The Site does not handle payments for these products directly, but rather refers these payments to a secure third-party payment processor which handles all aspects of the payment process. Any payment issues or disputes should be resolved directly with the payment processor. Once we have been notified by the payment processor that a payment has been made, and that the payment has successfully passed a fraud review, access will be granted to the product or service being purchased as soon as possible, however we make no guarantees of timeliness or immediacy. Free accounts are provided with a limited access to the Site that allows the user to test all available services prior to making a payment and determine if the offered services meet user’s needs. You may request a refund within 30 days of the payment only if your browser does not support JavaScript and you're not able to use our privacy policy generator, otherwise no refunds will be offered. Note that our system keeps track of your browser name, version and JavaScript support so we will verify each request for legitimacy.</p>


                            <p><strong>Responsibility of website visitors</strong></p>
                            <p>By operating the Site, Nature Checkout does not represent or imply that it endorses any or all the contributed content, or that it believes such material to be accurate, useful or non-harmful. You are responsible for taking precautions as necessary to protect yourself and your computer systems from viruses, worms, trojan horses, and other harmful or destructive content. The Site may contain content that is offensive, indecent, or otherwise objectionable, as well as content containing technical inaccuracies, typographical mistakes, and other errors. Nature Checkout disclaims any responsibility for any harm resulting from the use by visitors of the Site.</p>


                            <p><strong>Do we disclose any information to outside parties?</strong></p>
                            <p>We do not sell, trade, or otherwise transfer to outside parties your personally identifiable information, except to provide products or services you've requested. This does not include trusted third parties who assist us in operating our website, conducting our business, or servicing you, so long as those parties agree to keep this information confidential. We may also release your information when we believe release is appropriate to comply with the law, enforce our site policies, or protect ours or others rights, property, or safety. However, non-personally identifiable visitor information may be provided to other parties for marketing, advertising, or other uses.</p>


                            <p><strong>Copyright infringement and DMCA policy</strong></p>
                            <p>As Nature Checkout asks others to respect its intellectual property rights, it respects the intellectual property rights of others. If you believe that material located on or linked to by the Site violates your copyright, you are encouraged to notify Nature Checkout in accordance with common DMCA policies. Nature Checkout will respond to all such notices, including as required or appropriate by removing the infringing material or disabling all links to the infringing material. In the case of a visitor who may infringe or repeatedly infringes the copyrights or other intellectual property rights of Nature Checkout or others, Nature Checkout may, in its discretion, terminate or deny access to and use of the Site. In the case of such termination, Nature Checkout will have no obligation to provide a refund of any amounts previously paid to Nature Checkout. You further agree not to change or delete any proprietary notices from materials downloaded from the site. You must also retain our copyright notice in the privacy policy you create, unless you have purchased a premium membership in which case you may remove our copyright notice from your privacy statement.</p>


                            <p><strong>Do we use cookies?</strong></p>
                            <p>Yes, we use cookies (which are small pieces of information that your browser stores on your computer's hard drive) to help us remember and process the items in your shopping cart, understand and save your preferences for future visits and compile aggregate data about site traffic and site interaction so that we can offer better site experiences and tools in the future. We may contract with third-party service providers to assist us in better understanding our site visitors. These service providers are not permitted to use the information collected on our behalf except to help us conduct and improve our business.</p>


                            <p><strong>Third party links</strong></p>
                            <p>Our site may contain links to third party sites. These third party sites have separate and independent privacy policies. We therefore have no responsibility or liability for the content and activities of these linked sites. Nonetheless, we seek to protect the integrity of our site and welcome any feedback about these sites.</p>


                            <p><strong>Intellectual property</strong></p>
                            <p>This Agreement does not transfer from Nature Checkout to you any Nature Checkout or third-party intellectual property, and all right, title and interest in and to such property will remain (as between the parties) solely with Nature Checkout Inc. Nature Checkout logo, and all other trademarks, service marks, graphics and logos used in connection with Nature Checkout, or the Site are trademarks or registered trademarks of Nature Checkout or Nature Checkout's licensors. Other trademarks, service marks, graphics and logos used in connection with the Site may be the trademarks of other third parties. Your use of the Site grants you no right or license to reproduce or otherwise use any Nature Checkout or third-party trademarks.</p>


                            <p><strong>Changes</strong></p>
                            <p>Nature Checkout reserves the right, at its sole discretion, to modify or replace any part of this Agreement. It is your responsibility to check this Agreement periodically for changes. Your continued use of or access to the Site following the posting of any changes to this Agreement constitutes acceptance of those changes. Nature Checkout may also, in the future, offer new services and/or features through the Site (including, the release of new tools and resources). Such new features and/or services shall be subject to the terms and conditions of this Agreement.</p>


                            <p><strong>Limitation of liability</strong></p>
                            <p>In no event will Nature Checkout, or its suppliers or licensors, be liable with respect to any subject matter of this agreement under any contract, negligence, strict liability or other legal or equitable theory for: (i) any special, incidental or consequential damages; (ii) the cost of procurement or substitute products or services; (iii) for interruption of use or loss or corruption of data; or (iv) for any amounts that exceed the fees paid by you to Nature Checkout Inc under this agreement. Nature Checkout shall have no liability for any failure or delay due to matters beyond their reasonable control. The foregoing shall not apply to the extent prohibited by applicable law. Nature Checkout shall not be liable for any special or consequential damages that result from the use of, or the inability to use, the services and products offered on this site, or the performance of the services and products.</p>


                            <p><strong>General representation and warranty</strong></p>
                            <p>You represent and warrant that (i) your use of the Site will be in strict accordance with the Nature Checkout Privacy Policy, with this Agreement and with all applicable laws and regulations (including without limitation any local laws or regulations in your country, state, city, or other governmental area, regarding online conduct and acceptable content, and including all applicable laws regarding the transmission of technical data exported from the United States or the country in which you reside) and (ii) your use of the Site will not infringe or misappropriate the intellectual property rights of any third party.</p>


                            <p><strong>Changes to our terms and privacy policies</strong></p>
                            <p>From time to time we may make adjustments to this policy. Changes will be made at our sole discretion. Site's users are encouraged to check this policy for such changes. Your continued use of this site following changes to this policy constitutes your acceptance of the changes.</p>


                            <p><strong>Contacting us</strong></p>
                            <p>Any questions about this policy should be addressed to us via our contact form.</p>
                            <p>These policies have been last modified on March 9, 2023</p>

                            <p><b>NATURE CHECKOUT INC - Nature Checkout© 2023-2026 |Privacy Policy</b></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Return Policy Modal -->
        <div class="modal fade" id="returnPolicyModal" tabindex="-1" role="dialog" aria-labelledby="returnPolicyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="returnPolicyModalLabel">Return Policy</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="privacy-policy">
                            <h2>Nature Checkout Inc Return Policy</h2>
                            <p>At Nature Checkout Inc, we want you to be completely satisfied with your purchase. If for any reason you are not happy with your order, we offer a straightforward return policy to make the process as easy as possible. Please review the following guidelines for returning items:</p>

                            <p><strong>Eligibility:</strong></p>
                            <p>To be eligible for a return, items must be unused, in their original packaging, and in the same condition as when you received them. Any items that have been opened, used, or damaged by the customer are not eligible for return.</p>


                            <p><strong>Initiating a Return:</strong></p>
                            <p>To initiate a return, please contact our customer support team within 30 days of receiving your order. You can reach us via email at support@naturecheckout.com or through our contact form on the website. Please provide your order number and the reason for the return when contacting us.</p>


                            <p><strong>Return Shipping:</strong></p>
                            <p>Customers are responsible for the cost of return shipping unless the return is due to an error on our part (e.g., wrong item shipped, item arrived damaged). We recommend using a trackable shipping method to ensure that your return is received by us safely.</p>


                            <p><strong>Refund Process:</strong></p>
                            <p>Once we receive your returned items and verify that they meet our return eligibility criteria, we will process a refund to the original payment method used for the purchase. Please note that shipping charges are non-refundable, and a restocking fee may apply for certain returns.</p>


                            <p><strong>Exchanges:</strong></p>
                            <p>Unfortunately, we do not offer direct exchanges at this time. If you would like to exchange an item for a different size, color, or style, we recommend initiating a return for the unwanted item and placing a new order for the desired item.</p>


                            <p><strong>Damaged or Defective Items:</strong></p>
                            <p>If you receive a damaged or defective item, please contact us immediately so that we can arrange for a replacement or refund. We may request photo evidence of the damage or defect to assist with the resolution process.</p>


                            <p><strong>Return Address:</strong></p>
                            <p>Please contact our customer support team to obtain the appropriate return address for your return shipment. Currently, you may send all returns to this address.</p>
                            <p>Doba Inc</p>
                            <p>3300 N Triumph Blvd#G40</p>
                            <p>Lehi, UT 84043</p>

                            <p><strong>Final Sale Items:</strong></p>
                            <p>Certain items may be marked as final sale and are not eligible for return. Please check the product description or contact us for clarification before making your purchase.</p>
                            <p>If you have any further questions or need assistance with a return, please don't hesitate to reach out to our customer support team. Thank you for choosing Nature Checkout Inc for your eco-friendly shopping needs!</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Shipping Policy Modal -->
        <div class="modal fade" id="shippingPolicyModal" tabindex="-1" role="dialog" aria-labelledby="shippingPolicyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="shippingPolicyModalLabel">Shipping Policy</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="privacy-policy">
                            <h2>Nature Checkout Inc Shipping Policy</h2>
                            <p>Thank you for choosing Nature Checkout Inc for your eco-friendly shopping needs. We strive to ensure that your orders are processed smoothly and delivered to you in a timely manner. Here are the details of our shipping policy:</p>

                            <p><strong>Order Processing Time:</strong></p>
                            <p>Orders are typically processed within 1-2 business days after payment confirmation. Please note that orders placed on weekends or holidays may experience slight delays.</p>


                            <p><strong>Shipping Methods:</strong></p>
                            <p>We offer standard shipping as well as expedited shipping options for your convenience. The available shipping methods will be displayed during the checkout process.</p>


                            <p><strong>Shipping Rates:</strong></p>
                            <p>Shipping rates are calculated based on the weight of the items in your order and the destination address. You can view the shipping costs for your order during the checkout process before making a payment.</p>


                            <p><strong>Shipping Destinations:</strong></p>
                            <p>We currently offer shipping within the United States. We apologize for any inconvenience this may cause to our international customers and are working towards expanding our shipping capabilities in the future.</p>


                            <p><strong>Delivery Time:</strong></p>
                            <p>The delivery time depends on the shipping method selected and the destination of the order. Standard shipping typically takes 3-7 business days for delivery, while expedited shipping options offer faster delivery times.</p>


                            <p><strong>Order Tracking:</strong></p>
                            <p>Once your order has been shipped, you will receive a shipping confirmation email containing a tracking number. You can use this tracking number to monitor the status of your shipment and estimate the delivery date.</p>


                            <p><strong>Shipping Carriers:</strong></p>
                            <p>We partner with reliable shipping carriers to ensure the safe and timely delivery of your orders. The shipping carrier for your order will be determined based on factors such as the destination and the shipping method selected.</p>


                            <p><strong>Shipping Restrictions:</strong></p>
                            <p>Some items may be subject to shipping restrictions due to their size, weight, or contents. We will notify you during the checkout process if any items in your order are ineligible for shipping to your location.</p>

                            <p><strong>Returns and Exchanges:</strong></p>
                            <p>Please refer to our Returns Policy for information on how to initiate a return or exchange for items that do not meet your expectations.</p>
                            <p>f you have any further questions or require assistance regarding our shipping policy, please don't hesitate to contact our customer support team. Thank you for choosing Nature Checkout Inc for your eco-conscious shopping needs!</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection

