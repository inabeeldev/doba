@extends('shop.app')

@section('content')





<!-- Product Shop Section Begin -->
<section class="product-shop2 spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-3">
                <div class="section-title">
                    <h2>{{ $catName }}</h2>
                </div>
            </div>
            <div class="col-lg-12 order-1 order-lg-2">
                <div class="product-list">
                    <div class="row">
                        @foreach ($products as $p)

                        <div class="col-lg-4 col-sm-6">
                            <div class="product-item">
                                <div class="pi-pic">
                                    <a href="{{ route('product-detail', $p['spuId']) }}">
                                        <img src="{{ $p['pictureUrl'] }}" alt="" class="product-img">
                                    </a>
                                    <div class="sale pp-sale">Sale</div>
                                    <div class="icon">
                                        <i class="icon_heart_alt"></i>
                                    </div>
                                    <ul>
                                        <li class="w-icon active"><a href="{{ route('product-detail', $p['spuId']) }}">+ Add To Cart <i class="icon_bag_alt"></i></a></li>
                                    </ul>
                                </div>
                                <div class="pi-text">
                                    <a href="{{ route('product-detail', $p['spuId']) }}">
                                        <h5>{{ strlen($p['title']) > 50 ? substr($p['title'], 0, 50) . '...' : $p['title'] }}</h5>
                                    </a>
                                    <div class="product-price">
                                        ${{ number_format($p['maxPrice'] + ($p['maxPrice'] * 0.45), 2) }}
                                        <span>${{ number_format($p['maxPrice'] + ($p['maxPrice'] * 0.45) + 5, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                </div><br><br>
                @php
                    $totalPages = $productData['totalPages'];
                    $currentPage = $productData['currentPage'];
                    $maxPagesToShow = 8; // Adjust this value to control the number of page links to display
                @endphp

                @if($totalPages > 1)
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-lg justify-content-center">
                            @if($currentPage > 1)
                                <li class="page-item">
                                    <a class="page-link" href="{{ url('cat-products/' . $catId . '/' . str_replace(' ', '-', $catName) . '?page=1') }}" aria-label="First">
                                        <span aria-hidden="true">&laquo;&laquo;</span>
                                        <span class="sr-only">First</span>
                                    </a>
                                </li>
                            @endif

                            @for($i = max(1, $currentPage - floor($maxPagesToShow / 2)); $i <= min($totalPages, $currentPage + floor($maxPagesToShow / 2)); $i++)
                                <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                    <a class="page-link" href="{{ url('cat-products/' . $catId . '/' . str_replace(' ', '-', $catName) . '?page=' . $i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            @if($currentPage < $totalPages)
                                <li class="page-item">
                                    <a class="page-link" href="{{ url('cat-products/' . $catId . '/' . str_replace(' ', '-', $catName) . '?page=' . $totalPages) }}" aria-label="Last">
                                        <span aria-hidden="true">&raquo;&raquo;</span>
                                        <span class="sr-only">Last</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </nav>
                @endif

            </div>
        </div>
    </div>
</section>
<!-- Product Shop Section End -->



@endsection


@section('scripts')





@endsection




@if ($catName == "Home, Garden & Tools")

@section('title', 'Home, Garden & Tools | Nature Checkout')
@section('meta_description', 'Discover top-quality home, garden, and tools products at Nature Checkout. Shop now for the best deals on gifts, bath, decor, bedding, and more.')

@elseif ($catName == "Gifts")

@section('title', 'Unique Gifts for All Occasions | Nature Checkout')
@section('meta_description', 'Find the perfect gift for any occasion at Nature Checkout. Explore our wide range of unique and thoughtful gifts today.')

@elseif ($catName == "Bath")
    @section('title', 'Bath Essentials & Accessories | Nature Checkout')
    @section('meta_description', 'Shop bath essentials and accessories at Nature Checkout. Discover bath rugs, towels, fittings, and more for a perfect bathroom setup.')
@elseif ($catName == "Bath Rugs")
    @section('title', 'Bath Rugs & Mats | Nature Checkout')
    @section('meta_description', 'Browse our collection of bath rugs and mats. Add comfort and style to your bathroom with our top-quality selections.')
@elseif ($catName == "Bath Towels")
    @section('title', 'Soft & Absorbent Bath Towels | Nature Checkout')
    @section('meta_description', 'Discover our range of soft and absorbent bath towels at Nature Checkout. Shop now for the best quality and deals.')
@elseif ($catName == "Bathroom Fittings & Accessories")
    @section('title', 'Bathroom Fittings & Accessories | Nature Checkout')
    @section('meta_description', 'Upgrade your bathroom with our top-notch fittings and accessories. Explore our wide selection for a modern look.')
@elseif ($catName == "Decor")
    @section('title', 'Home Decor & Accessories | Nature Checkout')
    @section('meta_description', 'Enhance your home with our beautiful decor and accessories. Shop wall art, seasonal decor, and more at Nature Checkout.')
@elseif ($catName == "Home Decor")
    @section('title', 'Stylish Home Décor | Nature Checkout')
    @section('meta_description', 'Explore our collection of stylish home décor items. Find the perfect pieces to decorate your home today.')
@elseif ($catName == "Wall Art")
    @section('title', 'Unique Wall Art | Nature Checkout')
    @section('meta_description', 'Discover unique wall art to enhance your home. Shop our curated collection and find the perfect piece today.')
@elseif ($catName == "Seasonal Decor")
    @section('title', 'Seasonal Décor for Every Occasion | Nature Checkout')
    @section('meta_description', 'Celebrate every season with our beautiful seasonal décor. Shop the latest trends and styles at Nature Checkout.')
@elseif ($catName == "Bedding")
    @section('title', 'Quality Bedding Sets & Accessories | Nature Checkout')
    @section('meta_description', 'Shop quality bedding sets and accessories at Nature Checkout. Discover quilts, pillows, blankets, and more for a cozy sleep.')
@elseif ($catName == "Bedding Sets & Collections")
    @section('title', 'Bedding Sets & Collections | Nature Checkout')
    @section('meta_description', 'Find the perfect bedding sets and collections for your home. Shop luxury and comfort in one place.')
@elseif ($catName == "Quilts & Sets")
    @section('title', 'Quilts & Quilt Sets | Nature Checkout')
    @section('meta_description', 'Browse our range of quilts and quilt sets for a comfortable sleep. Shop now for quality and style.')
@elseif ($catName == "Blankets & Throws")
    @section('title', 'Cozy Blankets & Throws | Nature Checkout')
    @section('meta_description', 'Stay warm with our cozy blankets and throws. Discover a variety of styles and materials for ultimate comfort.')
@elseif ($catName == "Bed Pillows & Pillowcases")
    @section('title', 'Bed Pillows & Pillowcases | Nature Checkout')
    @section('meta_description', 'Shop high-quality bed pillows and pillowcases for a restful sleep. Find the perfect match for your bedding.')
@elseif ($catName == "Bedding Accessories")
    @section('title', 'Bedding Accessories | Nature Checkout')
    @section('meta_description', 'Complete your bedding with our range of accessories. Shop mattress protectors, bed skirts, and more.')
@elseif ($catName == "Kitchen & Dining")
    @section('title', 'Kitchen & Dining Essentials | Nature Checkout')
    @section('meta_description', 'Discover kitchen and dining essentials at Nature Checkout. Shop cookware, utensils, bakeware, and more.')
@elseif ($catName == "Food & Beverage")
    @section('title', 'Food & Beverage Supplies | Nature Checkout')
    @section('meta_description', 'Find quality food and beverage supplies for your kitchen. Shop our selection of gourmet foods and drinks.')
@elseif ($catName == "Bakeware")
    @section('title', 'Bakeware & Baking Tools | Nature Checkout')
    @section('meta_description', 'Shop bakeware and baking tools for all your baking needs. Discover quality products at great prices.')
@elseif ($catName == "Coffee, Tea & Espresso")
    @section('title', 'Coffee, Tea & Espresso | Nature Checkout')
    @section('meta_description', 'Enjoy the perfect brew with our coffee, tea, and espresso products. Shop now for top-quality selections.')
@elseif ($catName == "Cookware")
    @section('title', 'Cookware Sets & Accessories | Nature Checkout')
    @section('meta_description', 'Discover our range of cookware sets and accessories. Shop pots, pans, and more for your kitchen.')
@elseif ($catName == "Dining & Entertaining")
    @section('title', 'Dining & Entertaining Essentials | Nature Checkout')
    @section('meta_description', 'Shop dining and entertaining essentials at Nature Checkout. Find everything you need for your next gathering.')
@elseif ($catName == "Other Kitchen & Dining Supplies")
    @section('title', 'Kitchen & Dining Supplies | Nature Checkout')
    @section('meta_description', 'Explore a wide range of kitchen and dining supplies. Shop quality products at Nature Checkout.')
@elseif ($catName == "Kitchen & Table Linens")
    @section('title', 'Kitchen & Table Linens | Nature Checkout')
    @section('meta_description', 'Add style to your kitchen with our table linens. Shop tablecloths, napkins, and more.')
@elseif ($catName == "Kitchen Utensils & Gadgets")
    @section('title', 'Kitchen Utensils & Gadgets | Nature Checkout')
    @section('meta_description', 'Discover essential kitchen utensils and gadgets. Shop our wide range of tools for your kitchen.')
@elseif ($catName == "Kitchen Storage & Organization")
    @section('title', 'Kitchen Storage & Organization | Nature Checkout')
    @section('meta_description', 'Keep your kitchen organized with our storage solutions. Shop cabinets, racks, and more.')
@elseif ($catName == "Furniture")
    @section('title', 'Quality Furniture for Every Room | Nature Checkout')
    @section('meta_description', 'Shop quality furniture for every room in your home. Discover bedroom, living room, and office furniture at Nature Checkout.')
@elseif ($catName == "Bedroom Furniture")
    @section('title', 'Bedroom Furniture Sets | Nature Checkout')
    @section('meta_description', 'Find stylish and comfortable bedroom furniture sets. Shop beds, dressers, nightstands, and more.')
@elseif ($catName == "Living Room Furniture")
    @section('title', 'Living Room Furniture | Nature Checkout')
    @section('meta_description', 'Shop our selection of living room furniture. Discover sofas, coffee tables, and more for your home.')
@elseif ($catName == "Kitchen & Dining Room Furniture")
    @section('title', 'Kitchen & Dining Room Furniture | Nature Checkout')
    @section('meta_description', 'Upgrade your kitchen with our dining room furniture. Shop tables, chairs, and more.')
@elseif ($catName == "Home Office Furniture")
    @section('title', 'Home Office Furniture | Nature Checkout')
    @section('meta_description', 'Upgrade your workspace with our stylish home office furniture. Shop desks, chairs, and storage solutions now.')
@elseif ($catName == "Kids\' Furniture")
    @section('title', 'Kids\' Furniture | Nature Checkout')
    @section('meta_description', 'Discover a range of fun and functional kids\' furniture at Nature Checkout. Shop beds, desks, and storage for children.')
@elseif ($catName == "Home Entertainment Furniture")
    @section('title', 'Home Entertainment Furniture | Nature Checkout')
    @section('meta_description', 'Enhance your home entertainment setup with our stylish furniture. Shop TV stands, media consoles, and more.')
@elseif ($catName == "Other Furniture & Replacement Parts")
    @section('title', 'Furniture & Replacement Parts | Nature Checkout')
    @section('meta_description', 'Find other furniture and replacement parts at Nature Checkout. Shop a variety of styles and solutions for your home.')
@elseif ($catName == "Bathroom Furniture")
    @section('title', 'Bathroom Furniture | Nature Checkout')
    @section('meta_description', 'Discover stylish and functional bathroom furniture at Nature Checkout. Shop vanities, cabinets, and more.')
@elseif ($catName == "Accent Furniture")
    @section('title', 'Accent Furniture | Nature Checkout')
    @section('meta_description', 'Add a touch of style with our accent furniture. Shop side tables, chairs, and more for your home.')



    @elseif ($catName == "Home Improvement")
    @section('title', 'Home Improvement Tools & Supplies | Nature Checkout')
    @section('meta_description', 'Discover a wide range of home improvement tools and supplies at Nature Checkout. Shop building materials, electrical items, and more.')

    @elseif ($catName == "Heating, Cooling & Air Quality")
    @section('title', 'Heating, Cooling & Air Quality | Nature Checkout')
    @section('meta_description', 'Improve your home\'s comfort with our heating, cooling, and air quality products. Shop air conditioners, heaters, and purifiers.')

    @elseif ($catName == "Other Home Improvement Supplies")
    @section('title', 'Home Improvement Supplies | Nature Checkout')
    @section('meta_description', 'Find various home improvement supplies at Nature Checkout. Shop quality products to enhance your home.')

    @elseif ($catName == "Building Supplies")
    @section('title', 'Building Supplies | Nature Checkout')
    @section('meta_description', 'Shop building supplies for all your construction needs. Discover quality materials and products at Nature Checkout.')

    @elseif ($catName == "Electrical")
    @section('title', 'Electrical Supplies | Nature Checkout')
    @section('meta_description', 'Find electrical supplies for your home projects. Shop wiring, outlets, switches, and more.')

    @elseif ($catName == "Lighting & Ceiling Fans")
    @section('title', 'Lighting & Ceiling Fans | Nature Checkout')
    @section('meta_description', 'Brighten your home with our lighting and ceiling fans. Shop a wide selection of styles and options.')

    @elseif ($catName == "Home Storage & Organization")
    @section('title', 'Home Storage & Organization | Nature Checkout')
    @section('meta_description', 'Keep your home organized with our storage solutions. Shop cabinets, shelves, and more at Nature Checkout.')

    @elseif ($catName == "Power & Hand Tools")
    @section('title', 'Power & Hand Tools | Nature Checkout')
    @section('meta_description', 'Discover a wide range of power and hand tools for your projects. Shop drills, saws, wrenches, and more at Nature Checkout.')

    @elseif ($catName == "Hand Tools")
    @section('title', 'Hand Tools | Nature Checkout')
    @section('meta_description', 'Shop our selection of high-quality hand tools. Find wrenches, screwdrivers, hammers, and more.')

    @elseif ($catName == "Power Tools, Parts & Accessories")
    @section('title', 'Power Tools & Accessories | Nature Checkout')
    @section('meta_description', 'Discover a variety of power tools and accessories. Shop drills, saws, batteries, and more.')

    @elseif ($catName == "Tool Organizers")
    @section('title', 'Tool Organizers | Nature Checkout')
    @section('meta_description', 'Keep your tools organized with our storage solutions. Shop toolboxes, bags, and more.')

    @elseif ($catName == "Gardening Tools")
    @section('title', 'Gardening Tools | Nature Checkout')
    @section('meta_description', 'Find the right tools for your garden at Nature Checkout. Shop shovels, rakes, pruners, and more.')

    @elseif ($catName == "Lamps & Light Fixtures")
    @section('title', 'Lamps & Light Fixtures | Nature Checkout')
    @section('meta_description', 'Illuminate your home with our stylish lamps and light fixtures. Shop a wide variety of designs and styles.')

    @elseif ($catName == "Kitchen & Bath Fixtures")
    @section('title', 'Kitchen & Bath Fixtures | Nature Checkout')
    @section('meta_description', 'Upgrade your kitchen and bathroom with our fixtures. Shop faucets, sinks, showerheads, and more.')

    @elseif ($catName == "Hardware")
    @section('title', 'Hardware Supplies | Nature Checkout')
    @section('meta_description', 'Find all the hardware supplies you need at Nature Checkout. Shop fasteners, brackets, handles, and more.')

    @elseif ($catName == "Appliances")
    @section('title', 'Home Appliances | Nature Checkout')
    @section('meta_description', 'Shop home appliances at Nature Checkout. Find kitchen appliances, laundry machines, and more.')

    @elseif ($catName == "Kitchen Appliances")
    @section('title', 'Kitchen Appliances | Nature Checkout')
    @section('meta_description', 'Discover a range of kitchen appliances at Nature Checkout. Shop refrigerators, ovens, microwaves, and more.')

    @elseif ($catName == "Other Appliances")
    @section('title', 'Other Home Appliances | Nature Checkout')
    @section('meta_description', 'Browse our selection of other home appliances. Find the perfect products for your home.')

    @elseif ($catName == "Household Appliance")
    @section('title', 'Household Appliances | Nature Checkout')
    @section('meta_description', 'Shop household appliances at Nature Checkout. Discover a variety of products for your daily needs.')

    @elseif ($catName == "Appliance Parts & Accessories")
    @section('title', 'Appliance Parts & Accessories | Nature Checkout')
    @section('meta_description', 'Find parts and accessories for your appliances. Shop replacement parts and maintenance kits.')

    @elseif ($catName == "Patio, Lawn & Garden")
    @section('title', 'Patio, Lawn & Garden Supplies | Nature Checkout')
    @section('meta_description', 'Discover patio, lawn, and garden supplies at Nature Checkout. Shop furniture, tools, and more for your outdoor space.')

    @elseif ($catName == "Other Patio, Lawn & Garden Supplies")
    @section('title', 'Other Patio, Lawn & Garden Supplies | Nature Checkout')
    @section('meta_description', 'Explore a variety of patio, lawn, and garden supplies. Shop quality products for your outdoor needs.')

    @elseif ($catName == "Patio Supplies")
    @section('title', 'Patio Supplies | Nature Checkout')
    @section('meta_description', 'Find everything you need for your patio at Nature Checkout. Shop furniture, decor, and more.')

    @elseif ($catName == "Pools, Hot Tubs & Supplies")
    @section('title', 'Pools, Hot Tubs & Supplies | Nature Checkout')
    @section('meta_description', 'Shop pools, hot tubs, and supplies at Nature Checkout. Discover a variety of products to enhance your outdoor space.')

    @elseif ($catName == "Fine Art")
    @section('title', 'Fine Art Collection | Nature Checkout')
    @section('meta_description', 'Explore our fine art collection at Nature Checkout. Shop unique and beautiful pieces to decorate your home.')

    @elseif ($catName == "Event & Party Supplies")
    @section('title', 'Event & Party Supplies | Nature Checkout')
    @section('meta_description', 'Find everything you need for your next event or party at Nature Checkout. Shop decorations, tableware, and more.')









@elseif ($catName == "Beauty & Health")

@section('title', 'Beauty & Health Products | Nature Checkout')
@section('meta_description', 'Discover a wide range of beauty and health products at Nature Checkout. Shop skincare, makeup, hair care, and more.')

@elseif ($catName == "All Beauty")

@section('title', 'All Beauty Products | Nature Checkout')
@section('meta_description', 'Explore all beauty products at Nature Checkout. Find makeup, skincare, hair care, and more.')

@elseif ($catName == "Makeup")

@section('title', 'Makeup Products | Nature Checkout')
@section('meta_description', 'Shop a variety of makeup products at Nature Checkout. Discover foundations, lipsticks, eyeshadows, and more.')

@elseif ($catName == "Skin Care")

@section('title', 'Skin Care Products | Nature Checkout')
@section('meta_description', 'Find top-quality skincare products at Nature Checkout. Shop cleansers, moisturizers, serums, and more.')

@elseif ($catName == "Hair Care")

@section('title', 'Hair Care Products | Nature Checkout')
@section('meta_description', 'Discover hair care products at Nature Checkout. Shop shampoos, conditioners, treatments, and more.')

@elseif ($catName == "Fragrance")

@section('title', 'Fragrances & Perfumes | Nature Checkout')
@section('meta_description', 'Explore a range of fragrances and perfumes at Nature Checkout. Find your signature scent today.')

@elseif ($catName == "Beauty Tools & Accessories")

@section('title', 'Beauty Tools & Accessories | Nature Checkout')
@section('meta_description', 'Shop beauty tools and accessories at Nature Checkout. Discover brushes, sponges, tweezers, and more.')

@elseif ($catName == "Oral Care")

@section('title', 'Oral Care Products | Nature Checkout')
@section('meta_description', 'Maintain your oral health with products from Nature Checkout. Shop toothbrushes, toothpaste, floss, and more.')

@elseif ($catName == "Men's Grooming")

@section('title', "Men's Grooming Products | Nature Checkout")
@section('meta_description', 'Discover men\'s grooming products at Nature Checkout. Shop shaving kits, skincare, hair care, and more.')

@elseif ($catName == "Health, Household & Baby Care")

@section('title', 'Health, Household & Baby Care | Nature Checkout')
@section('meta_description', 'Find health, household, and baby care products at Nature Checkout. Shop household supplies, baby care, and more.')

@elseif ($catName == "Household Supplies")

@section('title', 'Household Supplies | Nature Checkout')
@section('meta_description', 'Shop household supplies at Nature Checkout. Find cleaning products, paper goods, and more.')

@elseif ($catName == "Baby Care & Child Care")

@section('title', 'Baby & Child Care Products | Nature Checkout')
@section('meta_description', 'Discover baby and child care products at Nature Checkout. Shop diapers, baby food, toys, and more.')

@elseif ($catName == "Health Care")

@section('title', 'Health Care Products | Nature Checkout')
@section('meta_description', 'Find health care products at Nature Checkout. Shop vitamins, supplements, first aid, and more.')

@elseif ($catName == "Sexual Wellness")

@section('title', 'Sexual Wellness Products | Nature Checkout')
@section('meta_description', 'Explore sexual wellness products at Nature Checkout. Shop condoms, lubricants, and more.')

@elseif ($catName == "Medical Supplies")

@section('title', 'Medical Supplies | Nature Checkout')
@section('meta_description', 'Shop medical supplies at Nature Checkout. Find bandages, thermometers, and more.')

@elseif ($catName == "Personal Care")

@section('title', 'Personal Care Products | Nature Checkout')
@section('meta_description', 'Discover personal care products at Nature Checkout. Shop deodorants, soaps, lotions, and more.')

@elseif ($catName == "Wellness & Relaxation")

@section('title', 'Wellness & Relaxation Products | Nature Checkout')
@section('meta_description', 'Find wellness and relaxation products at Nature Checkout. Shop aromatherapy, massage tools, and more.')

@elseif ($catName == "Hemp CBD Products")

@section('title', 'Hemp CBD Products | Nature Checkout')
@section('meta_description', 'Explore hemp CBD products at Nature Checkout. Shop oils, edibles, topicals, and more.')



@elseif ($catName == "Outdoor")

@section('title', 'Outdoor Gear & Equipment | Nature Checkout')
@section('meta_description', 'Discover outdoor gear and equipment at Nature Checkout. Shop climbing, cycling, RV equipment, and more for your adventures.')

@elseif ($catName == "Climbing")

@section('title', 'Climbing Gear & Equipment | Nature Checkout')
@section('meta_description', 'Shop climbing gear and equipment at Nature Checkout. Find ropes, harnesses, climbing shoes, and more.')

@elseif ($catName == "Cycling & Wheel Sports")

@section('title', 'Cycling & Wheel Sports Gear | Nature Checkout')
@section('meta_description', 'Discover cycling and wheel sports gear at Nature Checkout. Shop bikes, accessories, and parts for all your needs.')

@elseif ($catName == "Cycling & Wheel Sports Accessories")

@section('title', 'Cycling & Wheel Sports Accessories | Nature Checkout')
@section('meta_description', 'Find cycling and wheel sports accessories at Nature Checkout. Shop helmets, gloves, lights, and more.')

@elseif ($catName == "Bike Trainers")

@section('title', 'Bike Trainers | Nature Checkout')
@section('meta_description', 'Improve your cycling skills with bike trainers from Nature Checkout. Shop a variety of models for indoor training.')

@elseif ($catName == "Components & Parts")

@section('title', 'Bike Components & Parts | Nature Checkout')
@section('meta_description', 'Find bike components and parts at Nature Checkout. Shop wheels, brakes, chains, and more for your bike.')

@elseif ($catName == "Electric Bikes")

@section('title', 'Electric Bikes | Nature Checkout')
@section('meta_description', 'Explore electric bikes at Nature Checkout. Shop a range of e-bikes for commuting, leisure, and more.')

@elseif ($catName == "Kids' Bikes Components & Parts")

@section('title', 'Kids\' Bike Components & Parts | Nature Checkout')
@section('meta_description', 'Discover components and parts for kids\' bikes at Nature Checkout. Shop wheels, seats, and more for children\'s bikes.')

@elseif ($catName == "Other Cycles")

@section('title', 'Other Cycles | Nature Checkout')
@section('meta_description', 'Find a variety of cycles at Nature Checkout. Shop tricycles, unicycles, and other unique cycles.')

@elseif ($catName == "Dog Sports")

@section('title', 'Dog Sports Gear | Nature Checkout')
@section('meta_description', 'Shop dog sports gear at Nature Checkout. Find agility equipment, training tools, and more for your active dog.')

@elseif ($catName == "Electronics")

@section('title', 'Outdoor Electronics | Nature Checkout')
@section('meta_description', 'Explore outdoor electronics at Nature Checkout. Shop GPS devices, cameras, and more for your adventures.')

@elseif ($catName == "RV Equipment")

@section('title', 'RV Equipment & Accessories | Nature Checkout')
@section('meta_description', 'Find RV equipment and accessories at Nature Checkout. Shop RV covers, leveling blocks, and more.')

@elseif ($catName == "Scooters")

@section('title', 'Scooters & Accessories | Nature Checkout')
@section('meta_description', 'Shop scooters and accessories at Nature Checkout. Find electric scooters, kick scooters, and more.')

@elseif ($catName == "Skateboarding")

@section('title', 'Skateboards & Accessories | Nature Checkout')
@section('meta_description', 'Discover skateboards and accessories at Nature Checkout. Shop decks, wheels, protective gear, and more.')

@elseif ($catName == "Outdoor Recreation")

@section('title', 'Outdoor Recreation Gear | Nature Checkout')
@section('meta_description', 'Find outdoor recreation gear at Nature Checkout. Shop tents, sleeping bags, backpacks, and more.')

@elseif ($catName == "Outdoor Furniture")

@section('title', 'Outdoor Furniture | Nature Checkout')
@section('meta_description', 'Shop outdoor furniture at Nature Checkout. Find patio sets, seating, tables, and more for your outdoor space.')

@elseif ($catName == "Outdoor Décor")

@section('title', 'Outdoor Décor | Nature Checkout')
@section('meta_description', 'Enhance your outdoor space with our beautiful outdoor décor. Shop lighting, chimes, doormats, and more.')

@elseif ($catName == "Outdoor Storage")

@section('title', 'Outdoor Storage Solutions | Nature Checkout')
@section('meta_description', 'Keep your outdoor space organized with our storage solutions. Shop sheds, storage boxes, and more.')

@elseif ($catName == "Outdoor Heating & Cooling")

@section('title', 'Outdoor Heating & Cooling | Nature Checkout')
@section('meta_description', 'Stay comfortable outdoors with our heating and cooling products. Shop heaters, fans, and more.')

@elseif ($catName == "Pools, Hot Tubs & Supplies")

@section('title', 'Pools, Hot Tubs & Supplies | Nature Checkout')
@section('meta_description', 'Enjoy your outdoor space with our pools, hot tubs, and supplies. Shop a variety of options for relaxation and fun.')

@elseif ($catName == "Grills & Outdoor Cooking")

@section('title', 'Grills & Outdoor Cooking | Nature Checkout')
@section('meta_description', 'Elevate your outdoor cooking with our grills and accessories. Shop gas grills, charcoal grills, and more.')

@elseif ($catName == "Outdoor Kitchen Appliances & Storage")

@section('title', 'Outdoor Kitchen Appliances & Storage | Nature Checkout')
@section('meta_description', 'Create the perfect outdoor kitchen with our appliances and storage solutions. Shop refrigerators, cabinets, and more.')





@elseif ($catName == "Playground & Park Equipment")

@section('title', 'Playground & Park Equipment | Nature Checkout')
@section('meta_description', 'Equip your playground or park with our quality equipment. Shop swings, slides, and more.')

@elseif ($catName == "Gardening & Lawn Care")

@section('title', 'Gardening & Lawn Care | Nature Checkout')
@section('meta_description', 'Maintain a beautiful garden and lawn with our products. Shop tools, seeds, planters, and more.')

@elseif ($catName == "Green Houses & Accessories")

@section('title', 'Green Houses & Accessories | Nature Checkout')
@section('meta_description', 'Grow your plants in our greenhouses and accessories. Shop a variety of sizes and styles.')

@elseif ($catName == "Plant Support Structures")

@section('title', 'Plant Support Structures | Nature Checkout')
@section('meta_description', 'Support your plants with our structures. Shop stakes, trellises, and more.')

@elseif ($catName == "Plants, Seeds & Bulbs")

@section('title', 'Plants, Seeds & Bulbs | Nature Checkout')
@section('meta_description', 'Grow a beautiful garden with our plants, seeds, and bulbs. Shop a variety of options.')

@elseif ($catName == "Pots, Planters & Container Accessories")

@section('title', 'Pots, Planters & Container Accessories | Nature Checkout')
@section('meta_description', 'Find the perfect pots and planters for your garden. Shop a variety of styles and sizes.')

@elseif ($catName == "Watering Equipment")

@section('title', 'Watering Equipment | Nature Checkout')
@section('meta_description', 'Keep your garden hydrated with our watering equipment. Shop hoses, sprinklers, and more.')

@elseif ($catName == "Other Gardening Lawn & Care")

@section('title', 'Other Gardening & Lawn Care | Nature Checkout')
@section('meta_description', 'Explore other gardening and lawn care products at Nature Checkout. Find unique tools and accessories.')

@elseif ($catName == "Deck Tiles & Planks")

@section('title', 'Deck Tiles & Planks | Nature Checkout')
@section('meta_description', 'Enhance your outdoor space with our deck tiles and planks. Shop a variety of materials and styles.')

@elseif ($catName == "Camping & Hiking")

@section('title', 'Camping & Hiking Gear | Nature Checkout')
@section('meta_description', 'Gear up for your next adventure with our camping and hiking products. Shop tents, backpacks, cookware, and more.')

@elseif ($catName == "Other Camping & Hiking Products")

@section('title', 'Other Camping & Hiking Products | Nature Checkout')
@section('meta_description', 'Discover other camping and hiking products at Nature Checkout. Find unique gear for your adventures.')

@elseif ($catName == "Camping Cookware")

@section('title', 'Camping Cookware | Nature Checkout')
@section('meta_description', 'Prepare meals outdoors with our camping cookware. Shop pots, pans, and utensils.')

@elseif ($catName == "Camping Dining Items")

@section('title', 'Camping Dining Items | Nature Checkout')
@section('meta_description', 'Enjoy your meals with our camping dining items. Shop plates, cups, and cutlery.')

@elseif ($catName == "Freeze-Dried Food")

@section('title', 'Freeze-Dried Food | Nature Checkout')
@section('meta_description', 'Stock up on freeze-dried food for your camping trips. Shop a variety of meals and snacks.')

@elseif ($catName == "Tents Accessories")

@section('title', 'Tent Accessories | Nature Checkout')
@section('meta_description', 'Enhance your camping experience with our tent accessories. Shop stakes, tarps, and more.')

@elseif ($catName == "Water Bottles & Containers")

@section('title', 'Water Bottles & Containers | Nature Checkout')
@section('meta_description', 'Stay hydrated with our water bottles and containers. Shop a variety of sizes and styles.')

@elseif ($catName == "Backpacks & Bags")

@section('title', 'Backpacks & Bags | Nature Checkout')
@section('meta_description', 'Carry your gear with our backpacks and bags. Shop a variety of sizes and styles.')

@elseif ($catName == "Tents & Shelters")

@section('title', 'Tents & Shelters | Nature Checkout')
@section('meta_description', 'Find the perfect tent or shelter for your camping trip. Shop a variety of sizes and styles.')

@elseif ($catName == "Sleeping Bags & Camp Bedding")

@section('title', 'Sleeping Bags & Camp Bedding | Nature Checkout')
@section('meta_description', 'Stay warm and comfortable with our sleeping bags and camp bedding. Shop a variety of options.')

@elseif ($catName == "Camp Kitchen")

@section('title', 'Camp Kitchen Gear | Nature Checkout')
@section('meta_description', 'Prepare delicious meals outdoors with our camp kitchen gear. Shop stoves, cookware, utensils, and more.')

@elseif ($catName == "Camping Furniture")

@section('title', 'Camping Furniture | Nature Checkout')
@section('meta_description', 'Relax comfortably with our camping furniture. Shop chairs, tables, cots, and more for your outdoor adventures.')

@elseif ($catName == "Knives & Tools")

@section('title', 'Camping Knives & Tools | Nature Checkout')
@section('meta_description', 'Equip yourself with essential camping knives and tools. Shop multi-tools, knives, axes, and more.')

@elseif ($catName == "Lights & Lanterns")

@section('title', 'Camping Lights & Lanterns | Nature Checkout')
@section('meta_description', 'Illuminate your campsite with our lights and lanterns. Shop flashlights, lanterns, headlamps, and more.')

@elseif ($catName == "Navigation & Electronics")

@section('title', 'Navigation & Electronics | Nature Checkout')
@section('meta_description', 'Stay on track with our navigation and electronic gear. Shop GPS devices, compasses, radios, and more.')

@elseif ($catName == "Camping & Hiking Personal Care")

@section('title', 'Camping & Hiking Personal Care | Nature Checkout')
@section('meta_description', 'Maintain your hygiene with our personal care products. Shop portable showers, toiletries, first aid kits, and more.')

@elseif ($catName == "Safety & Survival")

@section('title', 'Safety & Survival Gear | Nature Checkout')
@section('meta_description', 'Be prepared with our safety and survival gear. Shop first aid kits, survival tools, emergency shelters, and more.')

@elseif ($catName == "Fashion Accessories")

@section('title', 'Fashion Accessories | Nature Checkout')
@section('meta_description', 'Complete your look with our fashion accessories. Shop bags, backpacks, cold-weather accessories, and more.')

@elseif ($catName == "Other Fashion Accessories")

@section('title', 'Other Fashion Accessories | Nature Checkout')
@section('meta_description', 'Explore a variety of fashion accessories at Nature Checkout. Find unique items to complement your style.')

@elseif ($catName == "Bags & Backpacks")

@section('title', 'Bags & Backpacks | Nature Checkout')
@section('meta_description', 'Shop stylish bags and backpacks at Nature Checkout')







@elseif ($catName == "Cold-weather Accessories")
@section('title', 'Cold-weather Accessories | Nature Checkout')
@section('meta_description', 'Stay warm with our cold-weather accessories. Shop hats, gloves, scarves, and more.')

@elseif ($catName == "Wallets, Card Cases & Money Organizers")
@section('title', 'Wallets, Card Cases & Money Organizers | Nature Checkout')
@section('meta_description', 'Keep your essentials organized with our wallets, card cases, and money organizers. Shop a variety of styles.')

@elseif ($catName == "Jewelry & Watches")
@section('title', 'Jewelry & Watches | Nature Checkout')
@section('meta_description', 'Discover beautiful jewelry and watches at Nature Checkout. Shop earrings, necklaces, rings, and more.')

@elseif ($catName == "Other Jewelry & Accessories")
@section('title', 'Other Jewelry & Accessories | Nature Checkout')
@section('meta_description', 'Explore a variety of jewelry and accessories at Nature Checkout. Find unique pieces to enhance your collection.')

@elseif ($catName == "Body Jewelry")
@section('title', 'Body Jewelry | Nature Checkout')
@section('meta_description', 'Shop stylish body jewelry at Nature Checkout. Find belly rings, nose rings, and more.')

@elseif ($catName == "Bracelets")
@section('title', 'Bracelets | Nature Checkout')
@section('meta_description', 'Discover beautiful bracelets at Nature Checkout. Shop bangles, cuffs, charm bracelets, and more.')

@elseif ($catName == "Brooches & Pins")
@section('title', 'Brooches & Pins | Nature Checkout')
@section('meta_description', 'Add a touch of elegance with our brooches and pins. Shop a variety of designs and styles.')

@elseif ($catName == "Charms")
@section('title', 'Charms | Nature Checkout')
@section('meta_description', 'Personalize your jewelry with our charms. Shop a variety of styles and themes.')

@elseif ($catName == "Earrings")
@section('title', 'Earrings | Nature Checkout')
@section('meta_description', 'Discover stunning earrings at Nature Checkout. Shop studs, hoops, dangles, and more.')

@elseif ($catName == "Necklaces")
@section('title', 'Necklaces | Nature Checkout')
@section('meta_description', 'Find beautiful necklaces at Nature Checkout. Shop pendants, chains, chokers, and more.')

@elseif ($catName == "Pendants")
@section('title', 'Pendants | Nature Checkout')
@section('meta_description', 'Shop stylish pendants at Nature Checkout. Find the perfect piece to complement your necklace.')

@elseif ($catName == "Rings")
@section('title', 'Rings | Nature Checkout')
@section('meta_description', 'Discover beautiful rings at Nature Checkout. Shop engagement rings, wedding bands, and more.')

@elseif ($catName == "Watches")
@section('title', 'Watches | Nature Checkout')
@section('meta_description', 'Find stylish watches at Nature Checkout. Shop a variety of designs for men and women.')

@elseif ($catName == "Unisex")
@section('title', 'Unisex Clothing & Accessories | Nature Checkout')
@section('meta_description', 'Discover unisex clothing and accessories at Nature Checkout. Shop fashion accessories, clothing, shoes, and more.')

@elseif ($catName == "Unisex Fashion Accessories")
@section('title', 'Unisex Fashion Accessories | Nature Checkout')
@section('meta_description', 'Shop unisex fashion accessories at Nature Checkout. Find bags, hats, scarves, and more.')

@elseif ($catName == "Unisex Clothing")
@section('title', 'Unisex Clothing | Nature Checkout')
@section('meta_description', 'Discover unisex clothing at Nature Checkout. Shop t-shirts, hoodies, jackets, and more.')

@elseif ($catName == "Unisex Shoes")
@section('title', 'Unisex Shoes | Nature Checkout')
@section('meta_description', 'Find unisex shoes at Nature Checkout. Shop sneakers, boots, sandals, and more.')

@elseif ($catName == "Unisex Work Clothing & Accessories")
@section('title', 'Unisex Work Clothing & Accessories | Nature Checkout')
@section('meta_description', 'Shop unisex work clothing and accessories at Nature Checkout. Find durable and stylish options for the workplace.')









@elseif ($catName == "Women")
@section('title', "Popular Online Shopping For Women | Nature Checkout")
@section('meta_description', "Discover the latest trends in women's fashion at Nature Checkout. Shop clothing, shoes, handbags, and accessories.")



@elseif ($catName == "Women's Clothing")
@section('title', "Women's Clothing | Nature Checkout")
@section('meta_description', "Shop stylish women's clothing at Nature Checkout. Find dresses, tops, pants, and more.")

@elseif ($catName == "Women's Shoes")

@section('title', "Women's Shoes | Nature Checkout")
@section('meta_description', "Discover fashionable women's shoes at Nature Checkout. Shop heels, flats, boots, and more.")

@elseif ($catName == "Women's Handbags & Wallets")

@section('title', "Women's Handbags & Wallets | Nature Checkout")
@section('meta_description', "Find stylish handbags and wallets for women at Nature Checkout. Shop a variety of designs and brands.")

@elseif ($catName == "Women's Fashion Accessories")

@section('title', "Women's Fashion Accessories | Nature Checkout")
@section('meta_description', "Complete your look with women's fashion accessories from Nature Checkout. Shop scarves, belts, hats, and more.")

@elseif ($catName == "Online Shopping For Men’s")

@section('title', "Online Shopping For Men’s | Nature Checkout")
@section('meta_description', "Discover the latest in men's fashion at Nature Checkout. Shop clothing, shoes, and accessories for every occasion.")

@elseif ($catName == "Men's Clothing")

@section('title', "Men's Clothing | Nature Checkout")
@section('meta_description', "Shop stylish men's clothing at Nature Checkout. Find shirts, pants, jackets, and more.")

@elseif ($catName == "Men's Shoes")

@section('title', "Men's Shoes | Nature Checkout")
@section('meta_description', "Discover fashionable men's shoes at Nature Checkout. Shop sneakers, dress shoes, boots, and more.")

@elseif ($catName == "Men's Fashion Accessories")

@section('title', "Men's Fashion Accessories | Nature Checkout")
@section('meta_description', "Complete your look with men's fashion accessories from Nature Checkout. Shop belts, wallets, hats, and more.")

@elseif ($catName == "Girls' Clothing & Accessories")

@section('title', "Girls' Clothing & Accessories | Nature Checkout")
@section('meta_description', "Discover stylish clothing and accessories for girls at Nature Checkout. Shop dresses, shoes, backpacks, and more.")

@elseif ($catName == "Boys' Clothing & Accessories")

@section('title', "Boys' Clothing & Accessories | Nature Checkout")
@section('meta_description', "Find trendy clothing and accessories for boys at Nature Checkout. Shop shirts, pants, shoes, and more.")

@elseif ($catName == "Baby")

@section('title', "Baby Clothing & Accessories | Nature Checkout")
@section('meta_description', "Shop adorable baby clothing and accessories at Nature Checkout. Find onesies, shoes, blankets, and more.")

@elseif ($catName == "Luggage & Travel Accessories")

@section('title', "Luggage & Travel Accessories | Nature Checkout")
@section('meta_description', "Discover a wide range of luggage and travel accessories at Nature Checkout. Shop suitcases, travel bags, and more.")

@elseif ($catName == "Other Luggage Supplies")

@section('title', "Other Luggage Supplies | Nature Checkout")
@section('meta_description', "Explore other luggage supplies at Nature Checkout. Find unique travel solutions for your needs.")

@elseif ($catName == "Travel Accessories")

@section('title', "Travel Accessories | Nature Checkout")
@section('meta_description', "Make your journey easier with our travel accessories. Shop travel pillows, luggage tags, and more.")

@elseif ($catName == "Waist Packs")

@section('title', "Waist Packs | Nature Checkout")
@section('meta_description', "Keep your essentials close with our waist packs. Shop a variety of styles and sizes.")

@elseif ($catName == "Toys, Kids & Baby Products")

@section('title', "Toys, Kids & Baby Products | Nature Checkout")
@section('meta_description', "Discover a wide range of toys, kids, and baby products at Nature Checkout. Shop toys, games, clothing, and more.")

@elseif ($catName == "Toys, Kids & Baby")

@section('title', "Toys, Kids & Baby Products | Nature Checkout")
@section('meta_description', "Discover a wide range of toys, kids, and baby products at Nature Checkout. Shop toys, games, clothing, and more.")


@elseif ($catName == "Toys & Games")

@section('title', "Toys & Games | Nature Checkout")
@section('meta_description', "Explore our collection of toys and games at Nature Checkout. Shop activities, arts & crafts, puzzles, and more.")

@elseif ($catName == "Activities & Amusements")

@section('title', "Activities & Amusements | Nature Checkout")
@section('meta_description', "Find fun activities and amusements for kids at Nature Checkout. Shop a variety of engaging toys and games.")

@elseif ($catName == "Other Toys & Games Supplies")

@section('title', "Other Toys & Games Supplies | Nature Checkout")
@section('meta_description', "Discover other toys and games supplies at Nature Checkout. Find unique and fun items for kids.")

@elseif ($catName == "Arts & Crafts")

@section('title', "Arts & Crafts | Nature Checkout")
@section('meta_description', "Inspire creativity with our arts and crafts supplies. Shop paints, markers, craft kits, and more.")

@elseif ($catName == "Baby & Toddler Toys")

@section('title', "Baby & Toddler Toys | Nature Checkout")
@section('meta_description', "Shop safe and fun toys for babies and toddlers at Nature Checkout. Find educational and entertaining options.")

@elseif ($catName == "Dolls & Accessories")

@section('title', "Dolls & Accessories | Nature Checkout")
@section('meta_description', "Discover a variety of dolls and accessories at Nature Checkout. Shop dolls, dollhouses, and more.")

@elseif ($catName == "Grown-Up Toys")

@section('title', "Grown-Up Toys | Nature Checkout")
@section('meta_description', "Find toys for grown-ups at Nature Checkout. Shop collectibles, puzzles, and more.")

@elseif ($catName == "Hobbies")

@section('title', "Hobbies | Nature Checkout")
@section('meta_description', "Explore hobby supplies at Nature Checkout. Shop model kits, RC cars, and more.")

@elseif ($catName == "Learning & Education")

@section('title', "Learning & Education Toys | Nature Checkout")
@section('meta_description', "Enhance learning with our educational toys. Shop STEM toys, books, and more.")

@elseif ($catName == "Novelty & Gag Toys")

@section('title', "Novelty & Gag Toys | Nature Checkout")
@section('meta_description', "Find fun novelty and gag toys at Nature Checkout. Shop prank items, joke toys, and more.")

@elseif ($catName == "Puppets")

@section('title', "Explore Puppets | Nature Checkout")
@section('meta_description', "Discover a variety of puppets at Nature Checkout. Shop hand puppets, finger puppets, and more.")

@elseif ($catName == "Puzzles")

@section('title', "Shop Jigsaw Puzzles Today | Nature Checkout")
@section('meta_description', "Challenge your mind with our puzzles. Shop jigsaw puzzles, brain teasers, and more.")

@elseif ($catName == "Sports & Outdoor Play")

@section('title', "Sports & Outdoor Play | Nature Checkout")
@section('meta_description', "Get active with our sports and outdoor play toys. Shop balls, outdoor games, and more.")

@elseif ($catName == "Stuffed Animals & Plush Toys")
@section('title', 'Stuffed Animals & Plush Toys | Nature Checkout')
@section('meta_description', 'Find cuddly stuffed animals and plush toys at Nature Checkout. Shop a variety of adorable options.')

@elseif ($catName == "Kids Online Shopping Store")
@section('title', 'Kids Online Shopping Store | Nature Checkout')
@section('meta_description', 'Shop for kids\' clothing, shoes, and accessories at Nature Checkout. Find everything you need for your child.')

@elseif ($catName == "Boys' Clothing, Shoes & Accessories")
@section('title', 'Boys\' Clothing, Shoes & Accessories | Nature Checkout')
@section('meta_description', 'Discover stylish clothing, shoes, and accessories for boys at Nature Checkout. Shop a variety of options.')

@elseif ($catName == "Girls' Clothing, Shoes & Accessories")
@section('title', 'Girls\' Clothing, Shoes & Accessories | Nature Checkout')
@section('meta_description', 'Find fashionable clothing, shoes, and accessories for girls at Nature Checkout. Shop dresses, shoes, and more.')

@elseif ($catName == "Baby Feeding")
@section('title', 'Baby Feeding Essentials | Nature Checkout')
@section('meta_description', 'Shop feeding essentials for babies at Nature Checkout. Find bottles, bibs, high chairs, and more.')

@elseif ($catName == "Diapers")
@section('title', 'Buy Diapers Online | Nature Checkout')
@section('meta_description', 'Keep your baby comfortable with our selection of diapers. Shop disposable and cloth diapers online today.')

@elseif ($catName == "Baby Gifts Online")
@section('title', 'Shop Baby Gifts Online | Nature Checkout')
@section('meta_description', 'Find the perfect baby gifts online at Nature Checkout. Shop gift sets, toys, and more.')

@elseif ($catName == "Furniture")
@section('title', 'Baby Furniture | Nature Checkout')
@section('meta_description', 'Create a cozy nursery with our baby furniture. Shop cribs, dressers, and more.')

@elseif ($catName == "Baby Bedding")
@section('title', 'Baby Bedding | Nature Checkout')
@section('meta_description', 'Shop soft and comfortable baby bedding at Nature Checkout. Find crib sheets, blankets, and more.')

@elseif ($catName == "Nursery & Nursery Décor")
@section('title', 'Nursery & Nursery Décor | Nature Checkout')
@section('meta_description', 'Decorate your nursery with our beautiful décor. Shop wall art, mobiles, and more.')

@elseif ($catName == "Baby Strollers")
@section('title', 'Baby Strollers | Nature Checkout')
@section('meta_description', 'Find the perfect stroller for your baby at Nature Checkout. Shop a variety of styles and brands.')

@elseif ($catName == "Car Seats & Other Safety Products")
@section('title', 'Car Seats & Safety Products | Nature Checkout')
@section('meta_description', 'Keep your baby safe with our car seats and safety products. Shop a variety of options.')

@elseif ($catName == "Monitor Boutique")
@section('title', 'Baby Monitors | Nature Checkout')
@section('meta_description', 'Monitor your baby with our reliable baby monitors. Shop video monitors, audio monitors, and more.')

@elseif ($catName == "Other Baby Products")
@section('title', 'Other Baby Products | Nature Checkout')
@section('meta_description', 'Explore other baby products at Nature Checkout. Find unique items for your baby.')

@elseif ($catName == "Bathing & Skin Care")
@section('title', 'Baby Bathing & Skin Care | Nature Checkout')
@section('meta_description', 'Keep your baby clean and healthy with our bathing and skin care products. Shop shampoos, lotions, and more.')

@elseif ($catName == "Unisex Clothing & Other Products")
@section('title', 'Unisex Baby Clothing & Products | Nature Checkout')
@section('meta_description', 'Discover unisex baby clothing and products at Nature Checkout. Shop a variety of styles and items.')



@elseif ($catName == "Motor Sports")
@section('title', 'Motor Sports Equipment | Nature Checkout')
@section('meta_description', 'Find motor sports equipment at Nature Checkout. Shop helmets, gloves, suits, and more.')

@elseif ($catName == "Shooting")
@section('title', 'Shooting Equipment & Gear | Nature Checkout')
@section('meta_description', 'Discover shooting equipment and gear at Nature Checkout. Shop guns, accessories, targets, and more.')

@elseif ($catName == "Other Shooting Products")
@section('title', 'Other Shooting Products | Nature Checkout')
@section('meta_description', 'Explore other shooting products at Nature Checkout. Find unique items for your shooting needs.')

@elseif ($catName == "Gun Accessories")
@section('title', 'Gun Accessories | Nature Checkout')
@section('meta_description', 'Shop gun accessories at Nature Checkout. Find scopes, holsters, magazines, and more.')

@elseif ($catName == "Game Cameras")
@section('title', 'Game Cameras | Nature Checkout')
@section('meta_description', 'Monitor wildlife with our game cameras. Shop a variety of models at Nature Checkout.')

@elseif ($catName == "Cleaning & Maintenance Products")
@section('title', 'Gun Cleaning & Maintenance Products | Nature Checkout')
@section('meta_description', 'Keep your firearms in top condition with our cleaning and maintenance products. Shop kits, oils, and more.')

@elseif ($catName == "Skating")
@section('title', 'Skating Equipment | Nature Checkout')
@section('meta_description', 'Discover skating equipment at Nature Checkout. Shop roller skates, inline skates, protective gear, and more.')

@elseif ($catName == "Snow Skiing")
@section('title', 'Snow Skiing Equipment | Nature Checkout')
@section('meta_description', 'Find snow skiing equipment at Nature Checkout. Shop skis, boots, poles, and more.')

@elseif ($catName == "Snowmobiling")
@section('title', 'Snowmobiling Gear | Nature Checkout')
@section('meta_description', 'Discover snowmobiling gear at Nature Checkout. Shop helmets, suits, gloves, and more.')

@elseif ($catName == "Softball")
@section('title', 'Softball Equipment | Nature Checkout')
@section('meta_description', 'Shop softball equipment at Nature Checkout. Find bats, gloves, balls, and more.')

@elseif ($catName == "Surfing")
@section('title', 'Surfing Equipment | Nature Checkout')
@section('meta_description', 'Discover surfing equipment at Nature Checkout. Shop surfboards, wetsuits, leashes, and more.')

@elseif ($catName == "Swimming")
@section('title', 'Swimming Gear | Nature Checkout')
@section('meta_description', 'Find swimming gear at Nature Checkout. Shop swimsuits, goggles, caps, and more.')

@elseif ($catName == "Golf")
@section('title', 'Golf Equipment & Gear | Nature Checkout')
@section('meta_description', 'Discover golf equipment and gear at Nature Checkout. Shop clubs, balls, bags, and more.')

@elseif ($catName == "Leisure Sports & Game Room")
@section('title', 'Leisure Sports & Game Room Equipment | Nature Checkout')
@section('meta_description', 'Enjoy leisure sports and game room activities with our equipment. Shop pool tables, darts, and more.')

@elseif ($catName == "Pets")
@section('title', 'Pet Supplies & Accessories | Nature Checkout')
@section('meta_description', 'Discover a wide range of pet supplies and accessories at Nature Checkout. Shop for dogs, cats, birds, fish, and more.')

@elseif ($catName == "Pet Supplies")
@section('title', 'Pet Supplies | Nature Checkout')
@section('meta_description', 'Find all your pet supplies at Nature Checkout. Shop food, toys, grooming tools, and more for your pets.')


@elseif ($catName == "Small Animals")
@section('title', 'Small Animal Supplies | Nature Checkout')
@section('meta_description', 'Find everything you need for your small pets at Nature Checkout. Shop food, cages, toys, and more.')

@elseif ($catName == "Other Small Animal Products")
@section('title', 'Other Small Animal Products | Nature Checkout')
@section('meta_description', 'Explore other small animal products at Nature Checkout. Find unique items for your small pets.')

@elseif ($catName == "Small Animal Carriers")
@section('title', 'Small Animal Carriers | Nature Checkout')
@section('meta_description', 'Transport your small pets safely with our carriers. Shop a variety of sizes and styles.')

@elseif ($catName == "Small Animal Collars, Harnesses & Leashes")
@section('title', 'Small Animal Collars, Harnesses & Leashes | Nature Checkout')
@section('meta_description', 'Walk your small pets with our collars, harnesses, and leashes. Shop a variety of styles and sizes.')

@elseif ($catName == "Small Animal Feeding & Watering Supplies")
@section('title', 'Small Animal Feeding & Watering Supplies | Nature Checkout')
@section('meta_description', 'Keep your small pets well-fed and hydrated with our feeding and watering supplies. Shop bowls, feeders, and more.')

@elseif ($catName == "Small Animal Grooming")
@section('title', 'Small Animal Grooming Supplies | Nature Checkout')
@section('meta_description', 'Keep your small pets looking their best with our grooming supplies. Shop brushes, shampoos, and more.')

@elseif ($catName == "Small Animal Houses & Habitats")
@section('title', 'Small Animal Houses & Habitats | Nature Checkout')
@section('meta_description', 'Provide a comfortable home for your small pets with our houses and habitats. Shop a variety of options.')

@elseif ($catName == "Small Animal Toys")
@section('title', 'Small Animal Toys | Nature Checkout')
@section('meta_description', 'Keep your small pets entertained with our selection of toys. Shop a variety of fun and engaging options.')


@elseif ($catName == "Reptiles & Amphibians")
@section('title', 'Reptile & Amphibian Supplies | Nature Checkout')
@section('meta_description', 'Discover a wide range of supplies for reptiles and amphibians at Nature Checkout. Shop food, habitats, and more.')


@elseif ($catName == "Pet Food &Treats")
@section('title', 'Pet Food & Treats | Nature Checkout')
@section('meta_description', 'Keep your pets happy and healthy with our food and treats. Shop a variety of options.')


@elseif ($catName == "Car & Travel")
@section('title', 'Pet Car & Travel Supplies | Nature Checkout')
@section('meta_description', 'Ensure safe and comfortable travel for your pets with our car and travel supplies. Shop carriers, seat covers, and more.')

@elseif ($catName == "Clippers, Blades & Accessories")
@section('title', 'Pet Clippers, Blades & Accessories | Nature Checkout')
@section('meta_description', 'Keep your pets well-groomed with our clippers, blades, and accessories. Shop a variety of grooming tools.')

@elseif ($catName == "Collar, Leads, Harnesses & Training")
@section('title', 'Collars, Leads, Harnesses & Training | Nature Checkout')
@section('meta_description', 'Train and walk your pets with our collars, leads, harnesses, and training supplies. Shop a variety of options.')

@elseif ($catName == "Crates & Accessories")
@section('title', 'Pet Crates & Accessories | Nature Checkout')
@section('meta_description', 'Provide a safe space for your pets with our crates and accessories. Shop a variety of sizes and styles.')

@elseif ($catName == "Dishes & Food Storage")
@section('title', 'Pet Dishes & Food Storage | Nature Checkout')
@section('meta_description', 'Keep your pet\'s food fresh and organized with our dishes and food storage solutions. Shop bowls, containers, and more.')

@elseif ($catName == "Doors & Gates")
@section('title', 'Pet Doors & Gates | Nature Checkout')
@section('meta_description', 'Control your pet\'s access with our doors and gates. Shop a variety of styles and sizes.')

@elseif ($catName == "Exercise Pens & Kennels")
@section('title', 'Pet Exercise Pens & Kennels | Nature Checkout')
@section('meta_description', 'Provide a safe play area for your pets with our exercise pens and kennels. Shop a variety of options.')

@elseif ($catName == "Flea & Tick")
@section('title', 'Flea & Tick Control | Nature Checkout')
@section('meta_description', 'Protect your pets from fleas and ticks with our control products. Shop treatments, collars, and more.')

@elseif ($catName == "Pet Furniture")
@section('title', 'Pet Furniture | Nature Checkout')
@section('meta_description', 'Provide comfort for your pets with our pet furniture. Shop beds, sofas, and more.')

@elseif ($catName == "Gifts For Pet Lovers")
@section('title', 'Gifts For Pet Lovers | Nature Checkout')
@section('meta_description', 'Find the perfect gifts for pet lovers at Nature Checkout. Shop unique and thoughtful items.')

@elseif ($catName == "Grooming Tools & Accessories")
@section('title', 'Pet Grooming Tools & Accessories | Nature Checkout')
@section('meta_description', 'Keep your pets looking their best with our grooming tools and accessories. Shop brushes, combs, and more.')

@elseif ($catName == "Health & Nutrition")
@section('title', 'Pet Health & Nutrition | Nature Checkout')
@section('meta_description', 'Ensure your pets stay healthy with our health and nutrition products. Shop vitamins, supplements, and more.')

@elseif ($catName == "Other Pet Products")
@section('title', 'Other Pet Products | Nature Checkout')
@section('meta_description', 'Explore other pet products at Nature Checkout. Find unique items for your pets.')

@elseif ($catName == "Pet Accessories")
@section('title', 'Pet Accessories | Nature Checkout')
@section('meta_description', 'Discover a variety of pet accessories at Nature Checkout. Shop tags, apparel, and more.')

@elseif ($catName == "Pet Carriers")
@section('title', 'Pet Carriers | Nature Checkout')
@section('meta_description', 'Transport your pets safely with our pet carriers. Shop a variety of sizes and styles.')

@elseif ($catName == "Pet Fashions")
@section('title', 'Pet Fashions | Nature Checkout')
@section('meta_description', 'Dress your pets in style with our pet fashions. Shop clothing, accessories, and more.')

@elseif ($catName == "Pet Food & Treats")
@section('title', 'Pet Food & Treats | Nature Checkout')
@section('meta_description', 'Keep your pets happy and healthy with our food and treats. Shop a variety of options.')

@elseif ($catName == "Stain, Odor & Clean up, House Train")
@section('title', 'Pet Stain, Odor & Clean-up | Nature Checkout')
@section('meta_description', 'Keep your home clean with our pet stain, odor, and clean-up products. Shop house training supplies and more.')

@elseif ($catName == "Pet Toys")
@section('title', 'Pet Toys | Nature Checkout')
@section('meta_description', 'Keep your pets entertained with our pet toys. Shop a variety of fun and engaging options.')

@elseif ($catName == "Treats")
@section('title', 'Pet Treats | Nature Checkout')
@section('meta_description', 'Reward your pets with our delicious treats. Shop a variety of flavors and types.')







@elseif ($catName == "Dogs")
@section('title', 'Dog Supplies & Accessories | Nature Checkout')
@section('meta_description', 'Discover a wide range of dog supplies and accessories at Nature Checkout. Shop food, toys, grooming tools, and more.')

@elseif ($catName == "Dog Food")
@section('title', 'Dog Food | Nature Checkout')
@section('meta_description', 'Keep your dog healthy with our selection of dog food. Shop dry, wet, and specialty diets.')

@elseif ($catName == "Dog Treats")
@section('title', 'Dog Treats | Nature Checkout')
@section('meta_description', 'Reward your dog with our delicious treats. Shop a variety of flavors and types.')

@elseif ($catName == "Dog Apparel & Accessories")
@section('title', 'Dog Apparel & Accessories | Nature Checkout')
@section('meta_description', 'Dress your dog in style with our apparel and accessories. Shop clothing, collars, and more.')

@elseif ($catName == "Dog Carriers & Travel Products")
@section('title', 'Dog Carriers & Travel Products | Nature Checkout')
@section('meta_description', 'Ensure safe travel for your dog with our carriers and travel products. Shop a variety of options.')

@elseif ($catName == "Dog Beds & Furniture")
@section('title', 'Dog Beds & Furniture | Nature Checkout')
@section('meta_description', 'Provide comfort for your dog with our beds and furniture. Shop a variety of styles and sizes.')

@elseif ($catName == "Dog Collars, Harnesses & Leashes")
@section('title', 'Dog Collars, Harnesses & Leashes | Nature Checkout')
@section('meta_description', 'Walk your dog with our collars, harnesses, and leashes. Shop a variety of styles and sizes.')

@elseif ($catName == "Dog Crates, Houses & Pens")
@section('title', 'Dog Crates, Houses & Pens | Nature Checkout')
@section('meta_description', 'Provide a safe space for your dog with our crates, houses, and pens. Shop a variety of options.')

@elseif ($catName == "Dog Doors, Gates & Ramps")
@section('title', 'Dog Doors, Gates & Ramps | Nature Checkout')
@section('meta_description', 'Ensure easy access for your dog with our doors, gates, and ramps. Shop a variety of styles and sizes.')

@elseif ($catName == "Dog Feeding & Watering Supplies")
@section('title', 'Dog Feeding & Watering Supplies | Nature Checkout')
@section('meta_description', 'Keep your dog well-fed and hydrated with our feeding and watering supplies. Shop bowls, feeders, and more.')

@elseif ($catName == "Other Dog Products")
@section('title', 'Other Dog Products | Nature Checkout')
@section('meta_description', 'Explore other dog products at Nature Checkout. Find unique items for your dog\'s needs.')

@elseif ($catName == "Dog Grooming")
@section('title', 'Dog Grooming Supplies | Nature Checkout')
@section('meta_description', 'Keep your dog looking their best with our grooming supplies. Shop brushes, shampoos, clippers, and more.')

@elseif ($catName == "Dog Health Supplies")
@section('title', 'Dog Health Supplies | Nature Checkout')
@section('meta_description', 'Ensure your dog\'s health with our health supplies. Shop vitamins, supplements, and more.')

@elseif ($catName == "Dog Toys")
@section('title', 'Dog Toys | Nature Checkout')
@section('meta_description', 'Keep your dog entertained with our selection of toys. Shop chew toys, fetch toys, and more.')

@elseif ($catName == "Dog Training & Behavior Aids")
@section('title', 'Dog Training & Behavior Aids | Nature Checkout')
@section('meta_description', 'Train your dog effectively with our training and behavior aids. Shop training collars, clickers, and more.')

@elseif ($catName == "Waste Bags & Pooper Scoopers")
@section('title', 'Waste Bags & Pooper Scoopers | Nature Checkout')
@section('meta_description', 'Keep your environment clean with our waste bags and pooper scoopers. Shop a variety of options.')

@elseif ($catName == "Cats")
@section('title', 'Cat Supplies & Accessories | Nature Checkout')
@section('meta_description', 'Discover a wide range of cat supplies and accessories at Nature Checkout. Shop food, toys, grooming tools, and more.')

@elseif ($catName == "Cat Food")
@section('title', 'Cat Food | Nature Checkout')
@section('meta_description', 'Keep your cat healthy with our selection of cat food. Shop dry, wet, and specialty diets.')

@elseif ($catName == "Other Cat Products")
@section('title', 'Other Cat Products | Nature Checkout')
@section('meta_description', 'Explore other cat products at Nature Checkout. Find unique items for your cat\'s needs.')

@elseif ($catName == "Cat Beds & Furniture")
@section('title', 'Cat Beds & Furniture | Nature Checkout')
@section('meta_description', 'Provide comfort for your cat with our beds and furniture. Shop a variety of styles and sizes.')

@elseif ($catName == "Cat Cages")
@section('title', 'Cat Cages | Nature Checkout')
@section('meta_description', 'Ensure your cat\'s safety with our cages. Shop a variety of sizes and styles.')

@elseif ($catName == "Cat Feeding & Watering Supplies")
@section('title', 'Cat Feeding & Watering Supplies | Nature Checkout')
@section('meta_description', 'Keep your cat well-fed and hydrated with our feeding and watering supplies. Shop bowls, feeders, and more.')

@elseif ($catName == "Cat Toys")
@section('title', 'Cat Toys | Nature Checkout')
@section('meta_description', 'Keep your cat entertained with our selection of toys. Shop interactive toys, scratchers, and more.')

@elseif ($catName == "Fish & Aquatic Pets")
@section('title', 'Fish & Aquatic Pet Supplies | Nature Checkout')
@section('meta_description', 'Discover a wide range of fish and aquatic pet supplies at Nature Checkout. Shop food, tanks, décor, and more.')

@elseif ($catName == "Fish & Aquatic Pet Food")
@section('title', 'Fish & Aquatic Pet Food | Nature Checkout')
@section('meta_description', 'Keep your aquatic pets healthy with our selection of food. Shop flakes, pellets, and more.')

@elseif ($catName == "Aquarium Decor")
@section('title', 'Aquarium Décor | Nature Checkout')
@section('meta_description', 'Enhance your aquarium with our décor. Shop plants, rocks, ornaments, and more.')

@elseif ($catName == "Other Fish & Aquatic Pet Products")
@section('title', 'Other Fish & Aquatic Pet Products | Nature Checkout')
@section('meta_description', 'Explore other fish and aquatic pet products at Nature Checkout. Find unique items for your aquarium.')

@elseif ($catName == "Aquarium Pumps & Filters")
@section('title', 'Aquarium Pumps & Filters | Nature Checkout')
@section('meta_description', 'Keep your aquarium clean with our pumps and filters. Shop a variety of models and sizes.')

@elseif ($catName == "Birds")
@section('title', 'Bird Supplies & Accessories | Nature Checkout')
@section('meta_description', 'Discover a wide range of bird supplies and accessories at Nature Checkout. Shop food, cages, toys, and more.')

@elseif ($catName == "Bird Food")
@section('title', 'Bird Food | Nature Checkout')
@section('meta_description', 'Keep your bird healthy with our selection of bird food. Shop seeds, pellets, and more.')

@elseif ($catName == "Bird Cages & Accessories")
@section('title', 'Bird Cages & Accessories | Nature Checkout')
@section('meta_description', 'Provide a safe and comfortable home for your bird with our cages and accessories. Shop a variety of options.')

@elseif ($catName == "Bird Carriers")
@section('title', 'Bird Carriers | Nature Checkout')
@section('meta_description', 'Transport your bird safely with our carriers. Shop a variety of sizes and styles.')

@elseif ($catName == "Bird Feeding & Watering Supplies")
@section('title', 'Bird Feeding & Watering Supplies | Nature Checkout')
@section('meta_description', 'Keep your bird well-fed and hydrated with our feeding and watering supplies. Shop bowls, feeders, and more.')

@elseif ($catName == "Other Bird Products")
@section('title', 'Other Bird Products | Nature Checkout')
@section('meta_description', 'Explore other bird products at Nature Checkout. Find unique items for your bird.')

@elseif ($catName == "Horses")
@section('title', 'Horse Supplies & Accessories | Nature Checkout')
@section('meta_description', 'Discover a wide range of horse supplies and accessories at Nature Checkout. Shop food, grooming tools, and more.')

@elseif ($catName == "Horse Treats")
@section('title', 'Horse Treats | Nature Checkout')
@section('meta_description', 'Reward your horse with our delicious treats. Shop a variety of flavors and types.')

@elseif ($catName == "Boots & Wraps")
@section('title', 'Horse Boots & Wraps | Nature Checkout')
@section('meta_description', 'Protect your horse\'s legs with our boots and wraps. Shop a variety of styles and sizes.')

@elseif ($catName == "Farrier Supplies")
@section('title', 'Farrier Supplies | Nature Checkout')
@section('meta_description', 'Keep your horse\'s hooves healthy with our farrier supplies. Shop tools, shoes, and more.')

@elseif ($catName == "Stable Supplies")
@section('title', 'Stable Supplies | Nature Checkout')
@section('meta_description', 'Maintain a clean and comfortable stable with our supplies. Shop bedding, buckets, and more.')


@elseif ($catName == "Toys")
@section('title', 'Horse Toys | Nature Checkout')
@section('meta_description', 'Keep your horse entertained with our selection of toys. Shop balls, ropes, and more.')

@elseif ($catName == "Horse Grooming")
@section('title', 'Horse Grooming Supplies | Nature Checkout')
@section('meta_description', 'Keep your horse looking their best with our grooming supplies. Shop brushes, shampoos, clippers, and more.')

@elseif ($catName == "Horse Health")
@section('title', 'Horse Health Supplies | Nature Checkout')
@section('meta_description', 'Ensure your horse\'s health with our health supplies. Shop vitamins, supplements, and more.')

@elseif ($catName == "Horse Blankets")
@section('title', 'Horse Blankets | Nature Checkout')
@section('meta_description', 'Keep your horse warm and comfortable with our blankets. Shop a variety of sizes and styles.')

@elseif ($catName == "Reptiles")
@section('title', 'Reptile Supplies & Accessories | Nature Checkout')
@section('meta_description', 'Discover a wide range of reptile supplies and accessories at Nature Checkout. Shop food, tanks, décor, and more.')

@elseif ($catName == "Reptile Food")
@section('title', 'Reptile Food | Nature Checkout')
@section('meta_description', 'Keep your reptile healthy with our selection of food. Shop insects, pellets, and more.')

@elseif ($catName == "Other Reptile Products")
@section('title', 'Other Reptile Products | Nature Checkout')
@section('meta_description', 'Explore other reptile products at Nature Checkout. Find unique items for your reptile.')

@elseif ($catName == "Reptile Heating & Lighting")
@section('title', 'Reptile Heating & Lighting | Nature Checkout')
@section('meta_description', 'Provide the right environment for your reptile with our heating and lighting products. Shop lamps, heaters, and more.')

@elseif ($catName == "Small Pets")
@section('title', 'Small Pet Supplies & Accessories | Nature Checkout')
@section('meta_description', 'Discover a wide range of small pet supplies and accessories at Nature Checkout. Shop food, cages, toys, and more.')

@elseif ($catName == "Small Pet Food")
@section('title', 'Small Pet Food | Nature Checkout')
@section('meta_description', 'Keep your small pet healthy with our selection of food. Shop pellets, hay, and more.')

@elseif ($catName == "Small Pet Bedding & Litter")
@section('title', 'Small Pet Bedding & Litter | Nature Checkout')
@section('meta_description', 'Provide comfort for your small pet with our bedding and litter. Shop a variety of options.')

@elseif ($catName == "Small Pet Cages")
@section('title', 'Small Pet Cages | Nature Checkout')
@section('meta_description', 'Provide a safe and comfortable home for your small pet with our cages. Shop a variety of sizes and styles.')

@elseif ($catName == "Small Pet Toys")
@section('title', 'Small Pet Toys | Nature Checkout')
@section('meta_description', 'Keep your small pet entertained with our selection of toys. Shop chew toys, tunnels, and more.')

@elseif ($catName == "Other Small Pet Products")
@section('title', 'Other Small Pet Products | Nature Checkout')
@section('meta_description', 'Explore other small pet products at Nature Checkout. Find unique items for your small pet.')







// Electronics
@elseif ($catName == "Electronics")
@section('title', 'Electronics | Nature Checkout')
@section('meta_description', 'Discover the latest in electronics at Nature Checkout. Shop accessories, batteries, GPS devices, and more.')

@elseif ($catName == "Electronics Accessories")
@section('title', 'Electronics Accessories | Nature Checkout')
@section('meta_description', 'Find essential electronics accessories at Nature Checkout. Shop cables, adapters, cases, and more.')

@elseif ($catName == "Batteries, Chargers & Power Supplies")
@section('title', 'Batteries, Chargers & Power Supplies | Nature Checkout')
@section('meta_description', 'Keep your devices powered with our batteries, chargers, and power supplies. Shop a variety of options.')

@elseif ($catName == "Other Electronics Products")
@section('title', 'Other Electronics Products | Nature Checkout')
@section('meta_description', 'Explore other electronics products at Nature Checkout. Find unique and innovative items.')

@elseif ($catName == "General Electronics")
@section('title', 'General Electronics | Nature Checkout')
@section('meta_description', 'Discover a wide range of general electronics at Nature Checkout. Shop gadgets, devices, and more.')

@elseif ($catName == "GPS & Navigation Devices")
@section('title', 'GPS & Navigation Devices | Nature Checkout')
@section('meta_description', 'Navigate with ease using our GPS and navigation devices. Shop automotive GPS, tracking devices, and more.')

@elseif ($catName == "Other GPS Supplies")
@section('title', 'Other GPS & Navigation Accessories | Nature Checkout')
@section('meta_description', 'Find additional accessories for your GPS and navigation devices. Shop mounts, cases, and more.')

@elseif ($catName == "Automotive GPS Devices")
@section('title', 'Automotive GPS Devices | Nature Checkout')
@section('meta_description', 'Stay on track with our automotive GPS devices. Shop a variety of models and brands.')

@elseif ($catName == "Tracking Devices")
@section('title', 'Tracking Devices | Nature Checkout')
@section('meta_description', 'Keep track of your belongings with our tracking devices. Shop GPS trackers, Bluetooth trackers, and more.')

@elseif ($catName == "Home Automation & Security")
@section('title', 'Home Automation & Security | Nature Checkout')
@section('meta_description', 'Secure and automate your home with our home automation and security products. Shop cameras, sensors, and more.')

@elseif ($catName == "Other Home Automation Supplies")
@section('title', 'Other Home Automation Supplies | Nature Checkout')
@section('meta_description', 'Explore other home automation supplies at Nature Checkout. Find unique and innovative products.')

@elseif ($catName == "Security & Surveillance")
@section('title', 'Security & Surveillance | Nature Checkout')
@section('meta_description', 'Protect your home with our security and surveillance products. Shop cameras, alarms, and more.')

@elseif ($catName == "Spy Gadgets")
@section('title', 'Spy Gadgets | Nature Checkout')
@section('meta_description', 'Discover spy gadgets at Nature Checkout. Shop hidden cameras, audio recorders, and more.')

@elseif ($catName == "Ipod, Mp3 & Media Players")
@section('title', 'iPod, Mp3 & Media Players | Nature Checkout')
@section('meta_description', 'Enjoy your favorite music with our iPod, Mp3, and media players. Shop a variety of models and brands.')

@elseif ($catName == "Portable Audio & Video")
@section('title', 'Portable Audio & Video | Nature Checkout')
@section('meta_description', 'Take your entertainment on the go with our portable audio and video products. Shop speakers, headphones, and more.')

@elseif ($catName == "TV & Video")
@section('title', 'TV & Video | Nature Checkout')
@section('meta_description', 'Enhance your viewing experience with our TV and video products. Shop TVs, projectors, and more.')

@elseif ($catName == "Home Audio & Theater")
@section('title', 'Home Audio & Theater | Nature Checkout')
@section('meta_description', 'Create the perfect home theater with our audio and theater products. Shop speakers, receivers, and more.')

@elseif ($catName == "Camera, Photo & Video")
@section('title', 'Camera, Photo & Video | Nature Checkout')
@section('meta_description', 'Capture every moment with our camera, photo, and video products. Shop cameras, lenses, and more.')

@elseif ($catName == "Cell Phones & Accessories")
@section('title', 'Cell Phones & Accessories | Nature Checkout')
@section('meta_description', 'Stay connected with our cell phones and accessories. Shop smartphones, cases, chargers, and more.')

@elseif ($catName == "Headphones")
@section('title', 'Headphones | Nature Checkout')
@section('meta_description', 'Enjoy high-quality sound with our headphones. Shop wireless, earbuds, sports headphones, and more.')

@elseif ($catName == "Headphone Accessories")
@section('title', 'Headphone Accessories | Nature Checkout')
@section('meta_description', 'Enhance your listening experience with our headphone accessories. Shop cases, cables, and more.')

@elseif ($catName == "Other Headphones")
@section('title', 'Other Headphones | Nature Checkout')
@section('meta_description', 'Explore other types of headphones at Nature Checkout. Find unique and innovative designs.')

@elseif ($catName == "Wireless Headphones")
@section('title', 'Wireless Headphones | Nature Checkout')
@section('meta_description', 'Enjoy the freedom of wireless headphones. Shop a variety of models and brands.')

@elseif ($catName == "Earbud Headphones")
@section('title', 'Earbud Headphones | Nature Checkout')
@section('meta_description', 'Find comfortable and high-quality earbud headphones at Nature Checkout. Shop a variety of styles.')

@elseif ($catName == "Sports & Fitness Headphones")
@section('title', 'Sports & Fitness Headphones | Nature Checkout')
@section('meta_description', 'Stay motivated with our sports and fitness headphones. Shop durable and sweat-resistant models.')

@elseif ($catName == "Bluetooth & Wireless Speakers")
@section('title', 'Bluetooth & Wireless Speakers | Nature Checkout')
@section('meta_description', 'Enjoy your music anywhere with our Bluetooth and wireless speakers. Shop portable and home models.')

@elseif ($catName == "Car Electronics")
@section('title', 'Car Electronics | Nature Checkout')
@section('meta_description', 'Upgrade your car with our electronics. Shop stereos, GPS devices, cameras, and more.')

@elseif ($catName == "Wearable Technology")
@section('title', 'Wearable Technology | Nature Checkout')
@section('meta_description', 'Stay connected and track your fitness with our wearable technology. Shop smartwatches, fitness trackers, and more.')

// Computers & Office Supplies
@elseif ($catName == "Computers & Office Supplies")
@section('title', 'Computers & Office Supplies | Nature Checkout')
@section('meta_description', 'Discover a wide range of computers and office supplies at Nature Checkout. Shop laptops, desks, accessories, and more.')


@elseif ($catName == "Computers, Office Supplies")
@section('title', 'Computers & Office Supplies | Nature Checkout')
@section('meta_description', 'Discover a wide range of computers and office supplies at Nature Checkout. Shop laptops, desks, accessories, and more.')

@elseif ($catName == "Other Office Supplies")
@section('title', 'Other Office Supplies | Nature Checkout')
@section('meta_description', 'Explore other office supplies at Nature Checkout. Find unique and essential items for your office.')

@elseif ($catName == "Office Maintenance, Janitorial & Lunchroom")
@section('title', 'Office Maintenance, Janitorial & Lunchroom Supplies | Nature Checkout')
@section('meta_description', 'Keep your office clean and organized with our maintenance, janitorial, and lunchroom supplies. Shop cleaning products, breakroom essentials, and more.')

@elseif ($catName == "Computers & Tablets")
@section('title', 'Computers & Tablets | Nature Checkout')
@section('meta_description', 'Find the latest computers and tablets at Nature Checkout. Shop desktops, laptops, tablets, and more.')

@elseif ($catName == "Desktops")
@section('title', 'Desktop Computers | Nature Checkout')
@section('meta_description', 'Discover powerful desktop computers at Nature Checkout. Shop a variety of models and brands.')

@elseif ($catName == "Laptops")
@section('title', 'Explore Laptops Online | Nature Checkout')
@section('meta_description', 'Find the perfect laptop for work or play at Nature Checkout. Shop a variety of models and brands.')

@elseif ($catName == "Tablets")
@section('title', 'Tablets | Nature Checkout')
@section('meta_description', 'Stay connected on the go with our tablets. Shop a variety of models and brands.')

@elseif ($catName == "Monitors")
@section('title', 'Monitors | Nature Checkout')
@section('meta_description', 'Enhance your computing experience with our monitors. Shop a variety of sizes and resolutions.')

@elseif ($catName == "Computer & Office Accessories")
@section('title', 'Computer & Office Accessories | Nature Checkout')
@section('meta_description', 'Find essential computer and office accessories at Nature Checkout. Shop cables, adapters, cases, and more.')

@elseif ($catName == "Drive Enclosures")
@section('title', 'Drive Enclosures | Nature Checkout')
@section('meta_description', 'Protect and expand your storage with our drive enclosures. Shop a variety of models and sizes.')

@elseif ($catName == "Misc Accessories")
@section('title', 'Miscellaneous Accessories | Nature Checkout')
@section('meta_description', 'Discover a variety of miscellaneous accessories for your computer and office needs. Shop unique and essential items.')

@elseif ($catName == "Other Computer & Office Accessories")
@section('title', 'Other Computer & Office Accessories | Nature Checkout')
@section('meta_description', 'Explore other computer and office accessories at Nature Checkout. Find unique and essential items.')

@elseif ($catName == "Audio & Video Accessories")
@section('title', 'Audio & Video Accessories | Nature Checkout')
@section('meta_description', 'Enhance your audio and video experience with our accessories. Shop cables, adapters, and more.')

@elseif ($catName == "Cable Security Devices")
@section('title', 'Cable Security Devices | Nature Checkout')
@section('meta_description', 'Keep your cables secure with our cable security devices. Shop locks, ties, and more.')

@elseif ($catName == "Cables & Interconnects")
@section('title', 'Cables & Interconnects | Nature Checkout')
@section('meta_description', 'Connect your devices with our cables and interconnects. Shop a variety of types and lengths.')

@elseif ($catName == "Cleaning & Repair")
@section('title', 'Cleaning & Repair Supplies | Nature Checkout')
@section('meta_description', 'Keep your devices in top condition with our cleaning and repair supplies. Shop kits, sprays, and more.')

@elseif ($catName == "Computer Cable Adapters")
@section('title', 'Computer Cable Adapters | Nature Checkout')
@section('meta_description', 'Connect your devices with our computer cable adapters. Shop a variety of types and sizes.')





@elseif ($catName == "Electronics")
@section('title', 'Electronics | Nature Checkout')
@section('meta_description', 'Discover the latest in electronics at Nature Checkout. Shop accessories, batteries, GPS devices, and more.')

@elseif ($catName == "Electronics Accessories")
@section('title', 'Electronics Accessories | Nature Checkout')
@section('meta_description', 'Find essential electronics accessories at Nature Checkout. Shop cables, adapters, cases, and more.')




@elseif ($catName == "Computers & Office Supplies")
@section('title', 'Computers & Office Supplies | Nature Checkout')
@section('meta_description', 'Discover a wide range of computers and office supplies at Nature Checkout. Shop laptops, desks, accessories, and more.')

@elseif ($catName == "Input Devices")
@section('title', 'Input Devices | Nature Checkout')
@section('meta_description', 'Enhance your computing experience with our input devices. Shop keyboards, mice, and more.')

@elseif ($catName == "Keyboards, Mice & Accessories")
@section('title', 'Keyboards, Mice & Accessories | Nature Checkout')
@section('meta_description', 'Find the perfect keyboards, mice, and accessories at Nature Checkout. Shop a variety of models and brands.')

@elseif ($catName == "Memory Cards & Accessories")
@section('title', 'Memory Cards & Accessories | Nature Checkout')
@section('meta_description', 'Expand your storage with our memory cards and accessories. Shop a variety of capacities and types.')

@elseif ($catName == "Printer Accessories")
@section('title', 'Printer Accessories | Nature Checkout')
@section('meta_description', 'Enhance your printing experience with our printer accessories. Shop trays, feeders, and more.')

@elseif ($catName == "Printer Ink & Toner")
@section('title', 'Printer Ink & Toner | Nature Checkout')
@section('meta_description', 'Keep your printer running with our ink and toner. Shop a variety of brands and models.')

@elseif ($catName == "Networking")
@section('title', 'Networking Equipment | Nature Checkout')
@section('meta_description', 'Stay connected with our networking equipment. Shop routers, switches, cables, and more.')

@elseif ($catName == "Drives & Storage")
@section('title', 'Drives & Storage | Nature Checkout')
@section('meta_description', 'Expand your storage with our drives and storage solutions. Shop hard drives, SSDs, and more.')

@elseif ($catName == "Computer Parts & Components")
@section('title', 'Computer Parts & Components | Nature Checkout')
@section('meta_description', 'Build or upgrade your computer with our parts and components. Shop CPUs, motherboards, memory, and more.')

@elseif ($catName == "Cases & Power Supplies")
@section('title', 'Cases & Power Supplies | Nature Checkout')
@section('meta_description', 'Protect and power your computer with our cases and power supplies. Shop a variety of models and brands.')

@elseif ($catName == "Controller Cards")
@section('title', 'Controller Cards | Nature Checkout')
@section('meta_description', 'Enhance your computer\'s functionality with our controller cards. Shop a variety of types and brands.')

@elseif ($catName == "Other Computer Parts & Components")
@section('title', 'Other Computer Parts & Components | Nature Checkout')
@section('meta_description', 'Explore other computer parts and components at Nature Checkout. Find unique and essential items.')

@elseif ($catName == "Sleeves, Cases, And Bags")
@section('title', 'Sleeves, Cases, And Bags | Nature Checkout')
@section('meta_description', 'Protect your devices with our sleeves, cases, and bags. Shop a variety of styles and sizes.')

@elseif ($catName == "CPU Processors")
@section('title', 'CPU Processors | Nature Checkout')
@section('meta_description', 'Upgrade your computer with our selection of CPU processors. Shop top brands and models.')

@elseif ($catName == "Fans & Cooling")
@section('title', 'Premium Fans & Cooling Components | Nature Checkout')
@section('meta_description', 'Browse our range of high-quality fans and cooling components, ensuring optimal performance for your devices. Shop at Nature Checkout today.')

@elseif ($catName == "Laptop Replacement Parts")
@section('title', 'Reliable Laptop Replacement Parts | Nature Checkout')
@section('meta_description', 'We offer a variety of reliable laptop replacement parts to prolong the lifespan of your device. Visit Nature Checkout for more.')

@elseif ($catName == "Memory")
@section('title', 'High-Speed Computer Memory | Nature Checkout')
@section('meta_description', 'Explore our wide selection of high-speed computer memory components for an enhanced computing experience. Check out Nature Checkout now.')

@elseif ($catName == "Motherboards")
@section('title', 'Quality Motherboards for Computers | Nature Checkout')
@section('meta_description', 'Find superior quality motherboards for your computer at Nature Checkout. Shop today for a better computing experience.')

@elseif ($catName == "Printers")
@section('title', 'High-Quality Printers for Home and Office | Nature Checkout')
@section('meta_description', 'From home to office use, find high-quality printers that suit your needs at Nature Checkout. Browse our selection today.')

@elseif ($catName == "Office & School Supplies")
@section('title', 'All Your Office & School Supplies Needs | Nature Checkout')
@section('meta_description', 'Shop at Nature Checkout for all your office and school supplies needs. From stationery to furniture, we\'ve got you covered.')

@elseif ($catName == "Adhesives")
@section('title', 'Top Adhesives for Office & School | Nature Checkout')
@section('meta_description', 'Discover a variety of adhesives perfect for office and school projects. Shop glue sticks, tapes, and more at Nature Checkout.')

@elseif ($catName == "Appointment Books")
@section('title', 'Organize with Appointment Books | Nature Checkout')
@section('meta_description', 'Stay organized with our selection of appointment books. Perfect for managing your schedule efficiently. Shop at Nature Checkout.')

@elseif ($catName == "Art & Drafting")
@section('title', 'Art & Drafting Supplies | Nature Checkout')
@section('meta_description', 'Find high-quality art and drafting supplies for your creative projects. Shop at Nature Checkout for the best selection.')

@elseif ($catName == "Audio Visual")
@section('title', 'Audio Visual Equipment | Nature Checkout')
@section('meta_description', 'Explore our range of audio visual equipment for presentations and more. Shop at Nature Checkout for quality AV supplies.')

@elseif ($catName == "Other Office & School Supplies")
@section('title', 'Miscellaneous Office & School Supplies | Nature Checkout')
@section('meta_description', 'Discover a variety of other office and school supplies to meet all your needs. Shop now at Nature Checkout.')

@elseif ($catName == "Binders")
@section('title', 'Durable Binders for Office & School | Nature Checkout')
@section('meta_description', 'Keep your documents organized with our durable binders. Perfect for office and school use. Shop at Nature Checkout.')

@elseif ($catName == "Binding Systems")
@section('title', 'Efficient Binding Systems | Nature Checkout')
@section('meta_description', 'Explore our efficient binding systems for professional document presentation. Shop at Nature Checkout today.')

@elseif ($catName == "Cards, Card Stock & Card Filing")
@section('title', 'Cards & Card Filing Supplies | Nature Checkout')
@section('meta_description', 'Find a variety of cards, card stock, and filing supplies for your office and school needs. Shop at Nature Checkout.')

@elseif ($catName == "Office & School Chairs and Accessories")
@section('title', 'Comfortable Office & School Chairs | Nature Checkout')
@section('meta_description', 'Shop for comfortable and ergonomic office and school chairs and accessories at Nature Checkout. Enhance your workspace today.')

@elseif ($catName == "Clips & Clamps")
@section('title', 'Clips & Clamps for Office & School | Nature Checkout')
@section('meta_description', 'Discover a variety of clips and clamps to keep your documents organized. Shop at Nature Checkout for all your needs.')

@elseif ($catName == "Clothes Racks")
@section('title', 'Sturdy Clothes Racks | Nature Checkout')
@section('meta_description', 'Find sturdy clothes racks for your office or school. Shop at Nature Checkout for quality and durability.')

@elseif ($catName == "Forms, Recordkeeping & Money Handling")
@section('title', 'Forms & Recordkeeping Supplies | Nature Checkout')
@section('meta_description', 'Shop for forms, recordkeeping, and money handling supplies at Nature Checkout. Keep your office organized and efficient.')

@elseif ($catName == "Computer Furniture")
@section('title', 'Ergonomic Computer Furniture | Nature Checkout')
@section('meta_description', 'Explore our range of ergonomic computer furniture to enhance your workspace. Shop at Nature Checkout for quality furniture.')

@elseif ($catName == "School Supplies")
@section('title', 'Essential School Supplies | Nature Checkout')
@section('meta_description', 'Find all the essential school supplies for students and teachers at Nature Checkout. Shop now for the best selection.')

@elseif ($catName == "Desks & Desk Accessories")
@section('title', 'Desks & Desk Accessories | Nature Checkout')
@section('meta_description', 'Discover a variety of desks and desk accessories to enhance your workspace. Shop at Nature Checkout for quality products.')

@elseif ($catName == "Office Basics")
@section('title', 'Office Basics & Essentials | Nature Checkout')
@section('meta_description', 'Shop for all your office basics and essentials at Nature Checkout. From pens to paper, we have everything you need.')

@elseif ($catName == "Office & School Furniture")
@section('title', 'Office & School Furniture | Nature Checkout')
@section('meta_description', 'Explore our selection of office and school furniture to create a comfortable and productive environment. Shop at Nature Checkout.')

@elseif ($catName == "Envelopes")
@section('title', 'Quality Envelopes for Office & School | Nature Checkout')
@section('meta_description', 'Find a variety of quality envelopes for all your mailing needs. Shop at Nature Checkout for office and school supplies.')

@elseif ($catName == "Office & School Equipment")
@section('title', 'Office & School Equipment | Nature Checkout')
@section('meta_description', 'Discover a wide range of office and school equipment to meet all your needs. Shop at Nature Checkout for the best selection.')

@elseif ($catName == "Files")
@section('title', 'Organize with Files & Folders | Nature Checkout')
@section('meta_description', 'Keep your documents organized with our selection of files and folders. Shop at Nature Checkout for all your office needs.')

@elseif ($catName == "Labels")
@section('title', 'Labels for Office & School | Nature Checkout')
@section('meta_description', 'Find a variety of labels for organizing your office and school supplies. Shop at Nature Checkout for quality labeling solutions.')

@elseif ($catName == "Laminators")
@section('title', 'Professional Laminators & Supplies | Nature Checkout')
@section('meta_description', 'Protect and preserve your documents with our professional laminators and supplies. Shop at Nature Checkout for reliable laminating solutions.')

@elseif ($catName == "Notebooks")
@section('title', 'High-Quality Notebooks for School & Office | Nature Checkout')
@section('meta_description', 'Discover a variety of high-quality notebooks perfect for school and office use. Shop at Nature Checkout for all your note-taking needs.')

@elseif ($catName == "Paper")
@section('title', 'Premium Paper Products | Nature Checkout')
@section('meta_description', 'Explore our selection of premium paper products for printing, writing, and more. Shop at Nature Checkout for all your paper needs.')

@elseif ($catName == "Tape Flags")
@section('title', 'Colorful Tape Flags for Organization | Nature Checkout')
@section('meta_description', 'Enhance your organization with our colorful tape flags. Perfect for marking important documents. Shop at Nature Checkout.')

@elseif ($catName == "Tapes")
@section('title', 'Versatile Tapes for Office & School | Nature Checkout')
@section('meta_description', 'Discover a range of versatile tapes for all your office and school projects. Shop at Nature Checkout for quality tape solutions.')















@elseif ($catName == "Industrial")
@section('title', 'Industrial Products - Nature Checkout')
@section('meta_description', 'Discover a wide range of industrial products at Nature Checkout. From hardware to cutting tools, find everything you need for your industrial needs.')

@elseif ($catName == "Other Industrial Products")
@section('title', 'Other Industrial Products - Nature Checkout')
@section('meta_description', 'Explore various industrial products that don\'t fit into specific categories. Find unique and essential items for your industrial applications.')

@elseif ($catName == "Hardware")
@section('title', 'Industrial Hardware - Nature Checkout')
@section('meta_description', 'Shop for high-quality industrial hardware at Nature Checkout. Browse our selection of fasteners, tools, and more.')

@elseif ($catName == "Abrasive & Finishing Products")
@section('title', 'Abrasive & Finishing Products - Nature Checkout')
@section('meta_description', 'Find top-notch abrasive and finishing products for your industrial needs. From wheels to discs, we have it all.')

@elseif ($catName == "Abrasive Accessories")
@section('title', 'Abrasive Accessories - Nature Checkout')
@section('meta_description', 'Discover a variety of abrasive accessories to complement your industrial tools. Shop now for the best deals.')

@elseif ($catName == "Abrasive Wheels & Discs")
@section('title', 'Abrasive Wheels & Discs - Nature Checkout')
@section('meta_description', 'Browse our selection of abrasive wheels and discs for efficient finishing. Quality products at competitive prices.')

@elseif ($catName == "Other Abrasive & Finishing Products")
@section('title', 'Other Abrasive & Finishing Products - Nature Checkout')
@section('meta_description', 'Explore other abrasive and finishing products for your industrial projects. Find unique items to complete your toolkit.')

@elseif ($catName == "Cutting Tools")
@section('title', 'Industrial Cutting Tools - Nature Checkout')
@section('meta_description', 'Shop for precision cutting tools at Nature Checkout. Our range includes saws, blades, and more for all your cutting needs.')

@elseif ($catName == "Fasteners")
@section('title', 'Industrial Fasteners - Nature Checkout')
@section('meta_description', 'Find durable and reliable fasteners for your industrial applications. Browse our extensive collection today.')

@elseif ($catName == "Filtration")
@section('title', 'Industrial Filtration Products - Nature Checkout')
@section('meta_description', 'Discover high-quality filtration products for industrial use. Ensure clean and efficient operations with our range.')

@elseif ($catName == "Hydraulics, Pneumatics & Plumbing")
@section('title', 'Hydraulics, Pneumatics & Plumbing - Nature Checkout')
@section('meta_description', 'Explore our selection of hydraulics, pneumatics, and plumbing products. Find everything you need for fluid control and management.')

@elseif ($catName == "Flow Meters")
@section('title', 'Flow Meters - Nature Checkout')
@section('meta_description', 'Shop for accurate and reliable flow meters. Perfect for monitoring and controlling fluid flow in industrial applications.')

@elseif ($catName == "Other Hydraulics, Pneumatics & Plumbing Products")
@section('title', 'Other Hydraulics, Pneumatics & Plumbing Products - Nature Checkout')
@section('meta_description', 'Discover additional hydraulics, pneumatics, and plumbing products. Find unique items to enhance your system.')

@elseif ($catName == "Hose Nozzles")
@section('title', 'Hose Nozzles - Nature Checkout')
@section('meta_description', 'Browse our selection of hose nozzles for efficient fluid control. Quality products for industrial use.')

@elseif ($catName == "Hydraulic Equipment")
@section('title', 'Hydraulic Equipment - Nature Checkout')
@section('meta_description', 'Find top-quality hydraulic equipment for your industrial needs. Shop now for reliable and durable products.')

@elseif ($catName == "Pumps")
@section('title', 'Industrial Pumps - Nature Checkout')
@section('meta_description', 'Discover a variety of industrial pumps for efficient fluid transfer. High-performance products at great prices.')

@elseif ($catName == "Seals & O-Rings")
@section('title', 'Seals & O-Rings - Nature Checkout')
@section('meta_description', 'Shop for durable seals and O-rings for industrial applications. Ensure leak-free operations with our products.')

@elseif ($catName == "Tubing, Pipe & Hose")
@section('title', 'Tubing, Pipe & Hose - Nature Checkout')
@section('meta_description', 'Browse our selection of tubing, pipes, and hoses for industrial use. Quality products for fluid transfer and management.')

@elseif ($catName == "Industrial Electrical")
@section('title', 'Industrial Electrical Products - Nature Checkout')
@section('meta_description', 'Explore our range of industrial electrical products. From controls to wiring, find everything you need for electrical systems.')

@elseif ($catName == "Controls & Indicators")
@section('title', 'Controls & Indicators - Nature Checkout')
@section('meta_description', 'Shop for reliable controls and indicators for industrial applications. Ensure precise monitoring and control with our products.')

@elseif ($catName == "Other Industrial Electrical Products")
@section('title', 'Other Industrial Electrical Products - Nature Checkout')
@section('meta_description', 'Discover additional industrial electrical products. Find unique items to complete your electrical systems.')

@elseif ($catName == "Optoelectronic Products")
@section('title', 'Optoelectronic Products - Nature Checkout')
@section('meta_description', 'Browse our selection of optoelectronic products for industrial use. Quality components for efficient optical-electronic applications.')

@elseif ($catName == "Semiconductor Products")
@section('title', 'Semiconductor Products - Nature Checkout')
@section('meta_description', 'Find high-performance semiconductor products for industrial applications. Shop now for reliable and efficient components.')

@elseif ($catName == "Wiring & Connecting")
@section('title', 'Shop Wiring & Connecting Products - Nature Checkout')
@section('meta_description', 'Explore our range of wiring and connecting products for industrial use. Ensure secure and efficient electrical connections.')

@elseif ($catName == "Industrial Power & Hand Tools")
@section('title', 'Industrial Power & Hand Tools - Nature Checkout')
@section('meta_description', 'Shop for high-quality industrial power and hand tools. Find everything you need for efficient and precise work.')

@elseif ($catName == "Lab & Scientific Products")
@section('title', 'Lab & Scientific Products - Nature Checkout')
@section('meta_description', 'Discover a wide range of lab and scientific products. From glassware to consumables, find everything you need for your lab.')

@elseif ($catName == "Glassware & Labware")
@section('title', 'Glassware & Labware - Nature Checkout')
@section('meta_description', 'Shop for high-quality glassware and labware. Essential products for accurate and efficient lab work.')

@elseif ($catName == "Lab Supplies & Consumables")
@section('title', 'Lab Supplies & Consumables - Nature Checkout')
@section('meta_description', 'Discover a wide range of lab supplies and consumables at Nature Checkout. From pipettes to test tubes, find everything you need for your laboratory.')

@elseif ($catName == "Other Lab & Scientific Products")
@section('title', 'Other Lab & Scientific Products - Nature Checkout')
@section('meta_description', 'Explore various lab and scientific products that don\'t fit into specific categories. Find unique and essential items for your laboratory needs.')

@elseif ($catName == "Occupational Health & Safety Products")
@section('title', 'Occupational Health & Safety Products - Nature Checkout')
@section('meta_description', 'Shop for top-quality occupational health and safety products. Ensure a safe and compliant workplace with our extensive range of safety gear and equipment.')

@elseif ($catName == "Packaging & Shipping Supplies")
@section('title', 'Packaging & Shipping Supplies - Nature Checkout')
@section('meta_description', 'Discover a variety of packaging and shipping supplies at Nature Checkout. From boxes to bubble wrap, find everything you need for secure shipping.')

@elseif ($catName == "Power Transmission Products")
@section('title', 'Power Transmission Products - Nature Checkout')
@section('meta_description', 'Explore our range of power transmission products. From belts to gears, find high-quality components for efficient power transfer.')

@elseif ($catName == "Brakes & Clutches")
@section('title', 'Brakes & Clutches - Nature Checkout')
@section('meta_description', 'Shop for reliable brakes and clutches for industrial applications. Ensure smooth and efficient power transmission with our products.')

@elseif ($catName == "Other Power Transmission Products")
@section('title', 'Other Power Transmission Products - Nature Checkout')
@section('meta_description', 'Discover additional power transmission products. Find unique items to complete your power transfer systems.')

@elseif ($catName == "Ratchets & Pawls")
@section('title', 'Ratchets & Pawls - Nature Checkout')
@section('meta_description', 'Browse our selection of ratchets and pawls for efficient power transmission. Quality products for industrial use.')

@elseif ($catName == "Tapes, Adhesives & Sealants")
@section('title', 'Tapes, Adhesives & Sealants - Nature Checkout')
@section('meta_description', 'Find a wide range of tapes, adhesives, and sealants for industrial applications. Shop now for high-quality bonding and sealing solutions.')

@elseif ($catName == "Test, Measure & Inspect")
@section('title', 'Test, Measure & Inspect - Nature Checkout')
@section('meta_description', 'Discover top-quality test, measure, and inspect tools at Nature Checkout. Ensure accuracy and reliability in your industrial processes.')

@elseif ($catName == "Machinery")
@section('title', 'Industrial Machinery - Nature Checkout')
@section('meta_description', 'Explore our range of industrial machinery. From agricultural to general machinery, find the equipment you need for efficient operations.')

@elseif ($catName == "Agricultural & Food Machinery")
@section('title', 'Agricultural & Food Machinery - Nature Checkout')
@section('meta_description', 'Shop for high-quality agricultural and food machinery. Find reliable equipment for efficient farming and food processing.')

@elseif ($catName == "General Machinery & Tools")
@section('title', 'General Machinery & Tools - Nature Checkout')
@section('meta_description', 'Discover a variety of general machinery and tools for industrial use. Quality products for efficient and precise work.')

@elseif ($catName == "Other Machinery Products")
@section('title', 'Other Machinery Products - Nature Checkout')
@section('meta_description', 'Explore additional machinery for various industrial applications. Find unique and essential equipment for your operations.')

@elseif ($catName == "Other Machinery")
@section('title', 'Other Machinery Products - Nature Checkout')
@section('meta_description', 'Explore additional machinery for various industrial applications. Find unique and essential equipment for your operations.')


@elseif ($catName == "Arts & Crafts")
@section('title', 'Arts & Crafts Supplies - Nature Checkout')
@section('meta_description', 'Discover a wide range of arts and crafts supplies at Nature Checkout. From beading to painting, find everything you need for your creative projects.')

@elseif ($catName == "Beading & Jewelry Making")
@section('title', 'Beading & Jewelry Making Supplies - Nature Checkout')
@section('meta_description', 'Shop for beading and jewelry making supplies at Nature Checkout. Find beads, tools, and kits for creating beautiful jewelry pieces.')

@elseif ($catName == "Crafting")
@section('title', 'Crafting Supplies - Nature Checkout')
@section('meta_description', 'Explore a variety of crafting supplies at Nature Checkout. From paper crafts to sculpture supplies, find everything you need for your craft projects.')

@elseif ($catName == "Other Crafting Products")
@section('title', 'Other Crafting Products - Nature Checkout')
@section('meta_description', 'Discover additional crafting products at Nature Checkout. Find unique items to complete your crafting projects.')

@elseif ($catName == "Craft Supplies")
@section('title', 'Craft Supplies - Nature Checkout')
@section('meta_description', 'Shop for essential craft supplies at Nature Checkout. From glue to scissors, find everything you need for your crafts.')

@elseif ($catName == "Paper & Paper Crafts")
@section('title', 'Paper & Paper Crafts - Nature Checkout')
@section('meta_description', 'Explore our selection of paper and paper crafts supplies. Find high-quality paper, cardstock, and more for your projects.')

@elseif ($catName == "Sculpture Supplies")
@section('title', 'Sculpture Supplies - Nature Checkout')
@section('meta_description', 'Discover a variety of sculpture supplies at Nature Checkout. From clay to tools, find everything you need for sculpting.')

@elseif ($catName == "Other Arts & Crafts Supplies")
@section('title', 'Other Arts & Crafts Supplies - Nature Checkout')
@section('meta_description', 'Explore various arts and crafts supplies that don\'t fit into specific categories. Find unique and essential items for your creative projects.')

@elseif ($catName == "Knitting & Crochet")
@section('title', 'Knitting & Crochet Supplies - Nature Checkout')
@section('meta_description', 'Shop for knitting and crochet supplies at Nature Checkout. Find yarn, needles, and kits for your knitting and crochet projects.')

@elseif ($catName == "Other Knitting & Crochet Supplies")
@section('title', 'Other Knitting & Crochet Supplies - Nature Checkout')
@section('meta_description', 'Discover additional knitting and crochet supplies. Find unique items to complete your knitting and crochet projects.')

@elseif ($catName == "Knitting Kits")
@section('title', 'Knitting Kits - Nature Checkout')
@section('meta_description', 'Shop for knitting kits at Nature Checkout. Find complete kits with yarn, needles, and patterns for your knitting projects.')

@elseif ($catName == "Knitting Needles")
@section('title', 'Knitting Needles - Nature Checkout')
@section('meta_description', 'Explore our selection of knitting needles. Find various sizes and types for your knitting projects.')

@elseif ($catName == "Yarn")
@section('title', 'Shop High Quality Yarn - Nature Checkout')
@section('meta_description', 'Shop for high-quality yarn at Nature Checkout. Find various colors and textures for your knitting and crochet projects.')

@elseif ($catName == "Needlework")
@section('title', 'Needlework Supplies - Nature Checkout')
@section('meta_description', 'Discover a variety of needlework supplies at Nature Checkout. From cross-stitch to embroidery, find everything you need for your needlework projects.')

@elseif ($catName == "Cross-Stitch")
@section('title', 'Cross-Stitch Supplies - Nature Checkout')
@section('meta_description', 'Shop for cross-stitch supplies at Nature Checkout. Find patterns, threads, and kits for your cross-stitch projects.')

@elseif ($catName == "Embroidery")
@section('title', 'Embroidery Supplies - Nature Checkout')
@section('meta_description', 'Explore our selection of embroidery supplies. Find threads, hoops, and patterns for your embroidery projects.')

@elseif ($catName == "Other Needlework Supplies")
@section('title', 'Other Needlework Supplies - Nature Checkout')
@section('meta_description', 'Discover additional needlework supplies. Find unique items to complete your needlework projects.')

@elseif ($catName == "Painting, Drawing & Art Supplies")
@section('title', 'Painting, Drawing & Art Supplies - Nature Checkout')
@section('meta_description', 'Shop for painting, drawing, and art supplies at Nature Checkout. Find paints, brushes, canvases, and more for your art projects.')

@elseif ($catName == "Art Paper")
@section('title', 'Art Paper - Nature Checkout')
@section('meta_description', 'Explore our selection of art paper. Find high-quality paper for drawing, painting, and other art projects.')

@elseif ($catName == "Other Painting, Drawing & Art Supplies")
@section('title', 'Other Painting, Drawing & Art Supplies - Nature Checkout')
@section('meta_description', 'Discover additional painting, drawing, and art supplies. Find unique items to complete your art projects.')

@elseif ($catName == "Drawing")
@section('title', 'Drawing Supplies - Nature Checkout')
@section('meta_description', 'Shop for drawing supplies at Nature Checkout. Find pencils, markers, and sketchbooks for your drawing projects.')

@elseif ($catName == "Painting")
@section('title', 'Painting Supplies - Nature Checkout')
@section('meta_description', 'Explore our selection of painting supplies. Find paints, brushes, and canvases for your painting projects.')

@elseif ($catName == "Party Decorations & Supplies")
@section('title', 'Party Decorations & Supplies - Nature Checkout')
@section('meta_description', 'Discover a variety of party decorations and supplies at Nature Checkout. From balloons to banners, find everything you need for your party.')

@elseif ($catName == "Scrapbooking & Stamping")
@section('title', 'Scrapbooking & Stamping Supplies - Nature Checkout')
@section('meta_description', 'Shop for scrapbooking and stamping supplies at Nature Checkout. Find papers, stamps, and embellishments for your scrapbooking projects.')

@elseif ($catName == "Other Scrapbooking & Stamping Supplies")
@section('title', 'Other Scrapbooking & Stamping Supplies - Nature Checkout')
@section('meta_description', 'Discover additional scrapbooking and stamping supplies. Find unique items to complete your scrapbooking projects.')

@elseif ($catName == "Scrapbooking & Stamping Kits")
@section('title', 'Scrapbooking & Stamping Kits - Nature Checkout')
@section('meta_description', 'Shop for scrapbooking and stamping kits at Nature Checkout. Find complete kits with papers, stamps, and embellishments.')

@elseif ($catName == "Scrapbooking Embellishments")
@section('title', 'Scrapbooking Embellishments - Nature Checkout')
@section('meta_description', 'Explore our selection of scrapbooking embellishments. Find stickers, die-cuts, and more to enhance your scrapbooking projects.')

@elseif ($catName == "Scrapbooking Tools")
@section('title', 'Scrapbooking Tools - Nature Checkout')
@section('meta_description', 'Discover a variety of scrapbooking tools at Nature Checkout. From punches to trimmers, find everything you need for your scrapbooking projects.')

@elseif ($catName == "Sewing")
@section('title', 'Sewing Supplies - Nature Checkout')
@section('meta_description', 'Shop for sewing supplies at Nature Checkout. Find fabrics, threads, sewing machines, and more for your sewing projects.')

@elseif ($catName == "Automotive")
@section('title', 'Automotive Products - Nature Checkout')
@section('meta_description', 'Discover a wide range of automotive products at Nature Checkout. From parts to tools, find everything you need for your vehicle maintenance and repair.')

@elseif ($catName == "Automotive Parts & Accessories")
@section('title', 'Automotive Parts & Accessories - Nature Checkout')
@section('meta_description', 'Shop for high-quality automotive parts and accessories at Nature Checkout. Find everything you need to keep your vehicle running smoothly.')

@elseif ($catName == "Automotive Tools & Equipment")
@section('title', 'Automotive Tools & Equipment - Nature Checkout')
@section('meta_description', 'Explore a variety of automotive tools and equipment at Nature Checkout. From diagnostics to repairs, find everything you need for your garage.')

@elseif ($catName == "Abrasives & Accessories")
@section('title', 'Abrasives & Accessories - Nature Checkout')
@section('meta_description', 'Discover a range of abrasives and accessories for automotive use. Shop now for quality products for sanding and polishing.')

@elseif ($catName == "Automotive Tools & Equipment Accessories")
@section('title', 'Automotive Tools & Equipment Accessories - Nature Checkout')
@section('meta_description', 'Find a variety of accessories for your automotive tools and equipment. Enhance your toolkit with our selection.')

@elseif ($catName == "Other Automotive Tools & Equipment")
@section('title', 'Other Automotive Tools & Equipment - Nature Checkout')
@section('meta_description', 'Explore other automotive tools and equipment for various applications. Find unique items to complete your garage setup.')


@elseif ($catName == "Other Automotive Parts & Accessories")
@section('title', 'Other Automotive Tools & Equipment - Nature Checkout')
@section('meta_description', 'Explore other automotive tools and equipment for various applications. Find unique items to complete your garage setup.')


@elseif ($catName == "Supplies & Materials")
@section('title', 'Automotive Supplies & Materials - Nature Checkout')
@section('meta_description', 'Shop for essential supplies and materials for automotive maintenance. Find lubricants, cleaners, and more.')

@elseif ($catName == "Tool Storage & Workbenches")
@section('title', 'Tool Storage & Workbenches - Nature Checkout')
@section('meta_description', 'Discover tool storage solutions and workbenches for your garage. Keep your tools organized and accessible.')

@elseif ($catName == "Automotive Air Conditioning Tools & Equipment")
@section('title', 'Shop For Air Conditioning Tools & Equipment - Nature Checkout')
@section('meta_description', 'Shop for automotive air conditioning tools and equipment. Find everything you need for AC maintenance and repairs.')

@elseif ($catName == "Garage & Shop")
@section('title', 'Garage & Shop Equipment - Nature Checkout')
@section('meta_description', 'Explore our range of garage and shop equipment. Find lifts, jacks, and more for your automotive workspace.')

@elseif ($catName == "Body Repair Tools")
@section('title', 'Shop Body Repair Tools - Nature Checkout')
@section('meta_description', 'Discover body repair tools for automotive use. Shop for dent pullers, hammers, and more.')

@elseif ($catName == "Diagnostic & Test Tools")
@section('title', 'Diagnostic & Test Tools - Nature Checkout')
@section('meta_description', 'Shop for automotive diagnostic and test tools. Find scan tools, multimeters, and more for vehicle diagnostics.')

@elseif ($catName == "Automotive Hand Tools")
@section('title', 'Buy Automotive Hand Tools - Nature Checkout')
@section('meta_description', 'Explore our selection of automotive hand tools. Find wrenches, pliers, and more for your automotive repairs.')

@elseif ($catName == "Tire Air Compressors & Inflators")
@section('title', 'Tire Air Compressors & Inflators - Nature Checkout')
@section('meta_description', 'Shop for tire air compressors and inflators. Keep your tires properly inflated with our reliable tools.')

@elseif ($catName == "Car/Vehicles Electronics & GPS")
@section('title', 'Car & Vehicle Electronics & GPS - Nature Checkout')
@section('meta_description', 'Discover a variety of car and vehicle electronics and GPS systems. Find everything from navigation to entertainment devices for your vehicle.')

@elseif ($catName == "Other Vehicle Electronics")
@section('title', 'Other Vehicle Electronics - Nature Checkout')
@section('meta_description', 'Explore other vehicle electronics at Nature Checkout. Find unique and essential electronic devices for your car.')

@elseif ($catName == "Vehicle Electronics Accessories")
@section('title', 'Vehicle Electronics Accessories - Nature Checkout')
@section('meta_description', 'Shop for vehicle electronics accessories. Find mounts, chargers, and more to enhance your vehicle\'s electronics.')


@elseif ($catName == "Gps")
@section('title', 'GPS & Navigation Devices | Nature Checkout')
@section('meta_description', 'Navigate with ease using our GPS and navigation devices. Shop automotive GPS, tracking devices, and more.')


@elseif ($catName == "Vehicle GPS")
@section('title', 'Vehicle GPS Systems - Nature Checkout')
@section('meta_description', 'Discover reliable vehicle GPS systems at Nature Checkout. Find navigation devices to help you reach your destination with ease.')

@elseif ($catName == "Motorcycle & Powersports")
@section('title', 'Motorcycle & Power Sports - Nature Checkout')
@section('meta_description', 'Shop for motorcycle and power sports products at Nature Checkout. Find parts, accessories, and gear for your motorcycle or power sports vehicle.')

@elseif ($catName == "Entertainment")
@section('title', 'Entertainment Products - Nature Checkout')
@section('meta_description', 'Discover a wide range of entertainment products at Nature Checkout. From music instruments to video games, find everything you need for your enjoyment.')

@elseif ($catName == "Music & Musical Instruments")
@section('title', 'Shop Music & Musical Instruments - Nature Checkout')
@section('meta_description', 'Shop for music and musical instruments at Nature Checkout. Find guitars, pianos, drums, and more to fuel your musical passion.')

@elseif ($catName == "Books & Video")
@section('title', 'Shop Books & Video - Nature Checkout')
@section('meta_description', 'Explore a variety of books and video products at Nature Checkout. From novels to movies, find everything you need for your reading and viewing pleasure.')

@elseif ($catName == "Video Games")
@section('title', 'Video Games - Nature Checkout')
@section('meta_description', 'Discover, & Buy latest video games at Nature Checkout. Find games for all platforms and genres to keep you entertained for hours.')

@elseif ($catName == "Other Automotive Products")
@section('title', 'Other Automotive Products - Nature Checkout')
@section('meta_description', 'Explore a variety of automotive products at Nature Checkout. Find unique and essential items for your vehicle.')





@elseif ($catName == "Snowmobiling")
@section('title', 'Snowmobiling Gear | Nature Checkout')
@section('meta_description', 'Discover snowmobiling gear at Nature Checkout. Shop helmets, suits, gloves, and more.')

@elseif ($catName == "Softball")
@section('title', 'Softball Equipment | Nature Checkout')
@section('meta_description', 'Shop softball equipment at Nature Checkout. Find bats, gloves, balls, and more.')

@elseif ($catName == "Surfing")
@section('title', 'Surfing Equipment | Nature Checkout')
@section('meta_description', 'Discover surfing equipment at Nature Checkout. Shop surfboards, wetsuits, leashes, and more.')

@elseif ($catName == "Swimming")
@section('title', 'Swimming Gear | Nature Checkout')
@section('meta_description', 'Find swimming gear at Nature Checkout. Shop swimsuits, goggles, caps, and more.')

@elseif ($catName == "Golf")
@section('title', 'Golf Equipment & Gear | Nature Checkout')
@section('meta_description', 'Discover golf equipment and gear at Nature Checkout. Shop clubs, balls, bags, and more.')

@elseif ($catName == "Leisure Sports & Game Room")
@section('title', 'Leisure Sports & Game Room Equipment | Nature Checkout')
@section('meta_description', 'Enjoy leisure sports and game room activities with our equipment. Shop pool tables, darts, and more.')





@elseif ($catName == "Sports")
@section('title', 'Sports Equipment & Gear | Nature Checkout')
@section('meta_description', 'Discover a wide range of sports equipment and gear at Nature Checkout. Shop boxing, airsoft, fitness, and more.')

@elseif ($catName == "Boxing")
@section('title', 'Boxing Equipment & Gear | Nature Checkout')
@section('meta_description', 'Shop boxing equipment and gear at Nature Checkout. Find gloves, protective gear, gym equipment, and more.')

@elseif ($catName == "Boxing Protective Gear")
@section('title', 'Boxing Protective Gear | Nature Checkout')
@section('meta_description', 'Stay safe with our boxing protective gear. Shop headgear, mouthguards, and more.')

@elseif ($catName == "Boxing Gym Equipment")
@section('title', 'Boxing Gym Equipment | Nature Checkout')
@section('meta_description', 'Equip your gym with our boxing equipment. Shop punching bags, speed bags, and more.')

@elseif ($catName == "Other Boxing Equipment")
@section('title', 'Other Boxing Equipment | Nature Checkout')
@section('meta_description', 'Discover other boxing equipment at Nature Checkout. Find unique items for your training needs.')

@elseif ($catName == "Boxing Gloves")
@section('title', 'Boxing Gloves | Nature Checkout')
@section('meta_description', 'Shop high-quality boxing gloves at Nature Checkout. Find gloves for training, sparring, and competition.')

@elseif ($catName == "Airsoft")
@section('title', 'Airsoft Equipment & Gear | Nature Checkout')
@section('meta_description', 'Discover airsoft equipment and gear at Nature Checkout. Shop guns, targets, protective gear, and more.')

@elseif ($catName == "Targets")
@section('title', 'Airsoft Targets | Nature Checkout')
@section('meta_description', 'Improve your aim with our airsoft targets. Shop a variety of targets for practice and training.')

@elseif ($catName == "Protective Gear")
@section('title', 'Airsoft Protective Gear | Nature Checkout')
@section('meta_description', 'Stay safe with our airsoft protective gear. Shop masks, vests, gloves, and more.')

@elseif ($catName == "Other Airsoft Products")
@section('title', 'Other Airsoft Products | Nature Checkout')
@section('meta_description', 'Explore other airsoft products at Nature Checkout. Find unique items for your airsoft needs.')

@elseif ($catName == "Guns")
@section('title', 'Airsoft Guns | Nature Checkout')
@section('meta_description', 'Shop a variety of airsoft guns at Nature Checkout. Find rifles, pistols, and more.')

@elseif ($catName == "Badminton")
@section('title', 'Badminton Equipment | Nature Checkout')
@section('meta_description', 'Discover badminton equipment at Nature Checkout. Shop rackets, shuttlecocks, nets, and more.')

@elseif ($catName == "Ballet & Dance")
@section('title', 'Ballet & Dance Gear | Nature Checkout')
@section('meta_description', 'Find ballet and dance gear at Nature Checkout. Shop shoes, leotards, tights, and more.')

@elseif ($catName == "Baseball")
@section('title', 'Baseball Equipment & Gear | Nature Checkout')
@section('meta_description', 'Shop baseball equipment and gear at Nature Checkout. Find bats, gloves, balls, and more.')

@elseif ($catName == "Boating")
@section('title', 'Boating Equipment & Accessories | Nature Checkout')
@section('meta_description', 'Discover boating equipment and accessories at Nature Checkout. Shop life jackets, paddles, and more.')

@elseif ($catName == "Exercise & Fitness")
@section('title', 'Exercise & Fitness Equipment | Nature Checkout')
@section('meta_description', 'Get fit with our exercise and fitness equipment. Shop strength training, cardio, yoga, and more.')

@elseif ($catName == "Strength Training Equipment")
@section('title', 'Strength Training Equipment | Nature Checkout')
@section('meta_description', 'Build muscle with our strength training equipment. Shop weights, benches, and more.')

@elseif ($catName == "Other Exercise & Fitness Equipment")
@section('title', 'Other Exercise & Fitness Equipment | Nature Checkout')
@section('meta_description', 'Explore other exercise and fitness equipment at Nature Checkout. Find unique items for your workout.')

@elseif ($catName == "Cardio Training")
@section('title', 'Cardio Training Equipment | Nature Checkout')
@section('meta_description', 'Improve your endurance with our cardio training equipment. Shop treadmills, bikes, and more.')

@elseif ($catName == "Triathlon")
@section('title', 'Triathlon Gear | Nature Checkout')
@section('meta_description', 'Gear up for your triathlon with our equipment. Shop wetsuits, bikes, running shoes, and more.')

@elseif ($catName == "Yoga")
@section('title', 'Yoga Equipment & Accessories | Nature Checkout')
@section('meta_description', 'Enhance your practice with our yoga equipment and accessories. Shop mats, blocks, straps, and more.')

@elseif ($catName == "Sport Accessories")
@section('title', 'Sport Accessories | Nature Checkout')
@section('meta_description', 'Find sport accessories at Nature Checkout. Shop bags, water bottles, towels, and more.')

@elseif ($catName == "Diving")
@section('title', 'Diving Equipment & Gear | Nature Checkout')
@section('meta_description', 'Discover diving equipment and gear at Nature Checkout. Shop masks, fins, wetsuits, and more.')

@elseif ($catName == "Other Sport Products")
@section('title', 'Other Sport Products | Nature Checkout')
@section('meta_description', 'Explore other sport products at Nature Checkout. Find unique items for various sports.')

@elseif ($catName == "Hunting & Fishing")
@section('title', 'Hunting & Fishing Gear | Nature Checkout')
@section('meta_description', 'Shop hunting and fishing gear at Nature Checkout. Find guns, rods, reels, and more.')

@elseif ($catName == "Hunting")
@section('title', 'Hunting Gear | Nature Checkout')
@section('meta_description', 'Discover hunting gear at Nature Checkout. Shop rifles, camouflage, and more.')

@elseif ($catName == "Fishing")
@section('title', 'Fishing Gear | Nature Checkout')
@section('meta_description', 'Find fishing gear at Nature Checkout. Shop rods, reels, tackle, and more.')

@elseif ($catName == "Other Hunting & Fishing Products")
@section('title', 'Other Hunting & Fishing Products | Nature Checkout')
@section('meta_description', 'Explore other hunting and fishing products at Nature Checkout. Find unique items for your outdoor adventures.')

@elseif ($catName == "Archery")
@section('title', 'Archery Equipment | Nature Checkout')
@section('meta_description', 'Shop archery equipment at Nature Checkout. Find bows, arrows, targets, and more.')

@elseif ($catName == "Fan Gear")
@section('title', 'Fan Gear | Nature Checkout')
@section('meta_description', 'Show your team spirit with our fan gear. Shop jerseys, hats, and more.')

@elseif ($catName == "Gymnastics")
@section('title', 'Gymnastics Equipment & Gear | Nature Checkout')
@section('meta_description', 'Discover gymnastics equipment and gear at Nature Checkout. Shop leotards, mats, and more.')

@elseif ($catName == "Water Sports")
@section('title', 'Water Sports Equipment | Nature Checkout')
@section('meta_description', 'Enjoy the water with our sports equipment. Shop wetsuits, wakeboards, kitesurfing gear, and more.')

@elseif ($catName == "Wetsuits")
@section('title', 'Wetsuits | Nature Checkout')
@section('meta_description', 'Stay warm in the water with our wetsuits. Shop a variety of styles and sizes.')

@elseif ($catName == "Wakeboarding")
@section('title', 'Wakeboarding Equipment | Nature Checkout')
@section('meta_description', 'Find wakeboarding equipment at Nature Checkout. Shop boards, bindings, and more.')

@elseif ($catName == "Other Water Sports Equipment")
@section('title', 'Other Water Sports Equipment | Nature Checkout')
@section('meta_description', 'Discover a variety of water sports equipment at Nature Checkout. Shop for unique and essential gear for all water activities.')

@elseif ($catName == "Kitesurfing Equipment")
@section('title', 'Kitesurfing Equipment | Nature Checkout')
@section('meta_description', 'Find top-quality kitesurfing equipment at Nature Checkout. Shop kites, boards, harnesses, and more.')

@elseif ($catName == "Team Sports")
@section('title', 'Team Sports Equipment | Nature Checkout')
@section('meta_description', 'Equip your team with the best sports gear at Nature Checkout. Shop basketball, football, volleyball, and more.')

@elseif ($catName == "Basketball")
@section('title', 'Basketball Equipment | Nature Checkout')
@section('meta_description', 'Shop basketball equipment at Nature Checkout. Find basketballs, hoops, shoes, and more.')

@elseif ($catName == "Football")
@section('title', 'Football Equipment | Nature Checkout')
@section('meta_description', 'Discover football equipment at Nature Checkout. Shop footballs, helmets, pads, and more.')

@elseif ($catName == "Volleyball")
@section('title', 'Volleyball Equipment | Nature Checkout')
@section('meta_description', 'Find volleyball equipment at Nature Checkout. Shop volleyballs, nets, shoes, and more.')

@elseif ($catName == "Fencing")
@section('title', 'Fencing Equipment | Nature Checkout')
@section('meta_description', 'Equip yourself with fencing gear at Nature Checkout. Shop foils, masks, jackets, and more.')

@elseif ($catName == "Other Team Sports")
@section('title', 'Other Team Sports Equipment | Nature Checkout')
@section('meta_description', 'Explore equipment for other team sports at Nature Checkout. Find gear for various sports activities.')

@elseif ($catName == "Law Enforcement")
@section('title', 'Law Enforcement Gear | Nature Checkout')
@section('meta_description', 'Discover law enforcement gear at Nature Checkout. Shop tactical equipment, uniforms, and more.')

@elseif ($catName == "Motor Sports")
@section('title', 'Motor Sports Equipment | Nature Checkout')
@section('meta_description', 'Find motor sports equipment at Nature Checkout. Shop helmets, gloves, suits, and more.')

@elseif ($catName == "Shooting")
@section('title', 'Shooting Equipment & Gear | Nature Checkout')
@section('meta_description', 'Discover shooting equipment and gear at Nature Checkout. Shop guns, accessories, targets, and more.')

@elseif ($catName == "Other Shooting Products")
@section('title', 'Other Shooting Products | Nature Checkout')
@section('meta_description', 'Explore other shooting products at Nature Checkout. Find unique items for your shooting needs.')

@elseif ($catName == "Gun Accessories")
@section('title', 'Gun Accessories | Nature Checkout')
@section('meta_description', 'Shop gun accessories at Nature Checkout. Find scopes, holsters, magazines, and more.')

@elseif ($catName == "Game Cameras")
@section('title', 'Game Cameras | Nature Checkout')
@section('meta_description', 'Monitor wildlife with our game cameras. Shop a variety of models at Nature Checkout.')

@elseif ($catName == "Cleaning & Maintenance Products")
@section('title', 'Gun Cleaning & Maintenance Products | Nature Checkout')
@section('meta_description', 'Keep your firearms in top condition with our cleaning and maintenance products. Shop kits, oils, and more.')

@elseif ($catName == "Skating")
@section('title', 'Skating Equipment | Nature Checkout')
@section('meta_description', 'Discover skating equipment at Nature Checkout. Shop roller skates, inline skates, protective gear, and more.')

@elseif ($catName == "Snow Skiing")
@section('title', 'Snow Skiing Equipment | Nature Checkout')
@section('meta_description', 'Find snow skiing equipment at Nature Checkout. Shop skis, boots, poles, and more.')

@else
@section('title', 'Nature Checkout')
@section('meta_description', 'Shop a wide range of products for all your needs at Nature Checkout. Quality products at great prices.')














@endif
{{--
@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '')

@elseif ($catName == "")

@section('title', '')
@section('meta_description', '') --}}

