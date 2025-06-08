<?php
/**
 * Template Name: Test Page
 * Template Post Type: page
 */
get_header(); ?>

<div class="hero-section">
    <div class="overlay"></div>
    <div class="hero-content">
        <div class="breadcrumb">MakeMyTrip > Travel Blog > <span>Surprise Me!</span></div>
        <h1 class="hero-title">Experience the Soul-Stirring<br> Treasures of Kakadu National Park</h1>
        <div class="author-box">
            <div class="author-name">Swechchha Roy</div>
            <div class="author-date">Last updated: May 26, 2025</div>
        </div>
    </div>
</div>

<div style="text-align: justify;">
Lorem ipsum, dolor sit amet consectetur adipisicing elit. Omnis velit eius saepe, odio suscipit distinctio cupiditate. Soluta provident sequi quidem iusto dolor excepturi unde magnam nesciunt dolorem vel? Repellendus quaerat cumque blanditiis aperiam, voluptas impedit possimus, illum deserunt fugit ex ipsum temporibus. Nobis, delectus optio magnam in labore similique quidem assumenda aperiam amet sint reprehenderit libero eius doloremque ut vero odio harum aut! Ipsum corrupti eos molestiae impedit aperiam magnam quod hic quis numquam magni illo ipsa recusandae dolore iure, repellendus ad nostrum eveniet error. Optio nulla dolor iure quasi eius enim nam cum soluta illum, repudiandae quia minima magni rem, ad fugit id vero modi aut, magnam laudantium in officia odit voluptatem! Recusandae aliquid dolores rerum magni, quaerat veniam nostrum ab ipsam libero minima cum accusamus amet facere! Impedit delectus minima, reiciendis molestiae aperiam recusandae dolore architecto praesentium expedita cumque nulla. Doloribus quos commodi temporibus iusto. Sequi modi quis, porro earum inventore animi corrupti iste natus explicabo laudantium, reprehenderit accusamus minus dolore sint laborum aliquam consequuntur provident distinctio eaque numquam facere quaerat magnam. Fuga ea rerum ratione,
distinctio est vitae reprehenderit pariatur. Adipisci deserunt obcaecati rerum natus aliquid, veniam neque saepe exercitationem optio sapiente odio blanditiis enim. Sit similique voluptate doloribus expedita, quisquam et recusandae eaque quis culpa aspernatur laboriosam vel, consequatur autem quaerat! Veritatis unde accusamus saepe doloribus, quas, sit eum earum natus ratione blanditiis iste at error, voluptas voluptatem nobis nemo sequi incidunt? Ab, recusandae doloribus. Provident nobis earum, temporibus vero quisquam rerum natus odio laboriosam excepturi at qui doloribus aliquid voluptate vel voluptatum asperiores quibusdam consequuntur eius blanditiis, possimus adipisci ducimus assumenda
eum? Dicta in tempore aspernatur dolorem hic, ducimus eveniet nobis earum deleniti sapiente id dolores unde nulla! Placeat, in modi! Quis similique, vero ut sunt nesciunt non, quisquam doloribus soluta, nemo repellendus ea laboriosam est officiis reprehenderit consequatur? Perspiciatis iusto, optio facere eligendi harum minima natus, eos dolore magnam
necessitatibus dolores maxime repudiandae at temporibus maiores repellat laudantium inventore quasi voluptatem. Vitae ipsam unde incidunt. Consectetur accusantium sed voluptatibus magnam explicabo cupiditate ab, tempora aspernatur magni placeat quaerat obcaecati ullam facilis architecto sit iusto quas, et sint beatae veniam sunt vel. Laudantium magnam hic
placeat, dolores repudiandae corporis blanditiis expedita distinctio reprehenderit quas neque suscipit voluptatibus dolore fuga rem tempora, nobis, obcaecati commodi. Quam autem, optio, nihil unde cupiditate magnam ab porro iure vero voluptate, pariatur est dignissimos similique iusto dicta deserunt repellat. Eum aperiam harum asperiores voluptate
mollitia repellat tempore facere nihil blanditiis saepe, hic quidem quis laudantium a ratione officia impedit, dolore qui consequatur ipsum, corporis velit illum vel! Quibusdam harum sint reprehenderit minus fuga ipsa quia architecto hic deserunt totam autem praesentium, ex commodi voluptates officia inventore dolor asperiores molestias dicta dolores
dignissimos! Vero, aspernatur ratione officia inventore nobis fugiat? Amet maxime, adipisci eos cum ipsum voluptas, asperiores placeat quibusdam neque sed officia laboriosam ratione. Architecto adipisci earum aliquid pariatur explicabo facere cum similique vel, numquam, quibusdam tenetur corporis, cumque aspernatur obcaecati. Magnam tenetur accusantium
inventore, quam esse deleniti aut alias!
</div>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
<style>
    * {
        margin: 0px;
        font-family: Roboto;
    }

    .hero-section {
        position: relative;
        height: 100vh;
        background: url('https://images.unsplash.com/photo-1460627390041-532a28402358?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') no-repeat center center/cover;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        text-align: center;
        font-family: 'Georgia', serif;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.5), transparent);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 900px;
        padding: 0 1px;
    }

    .breadcrumb {
        font-size: 14px;
        color: #ddd;
        margin-bottom: 10px;
    }

    .breadcrumb span {
        font-weight: bold;
        color: #f55;
    }

    .hero-title {
        font-size: 2rem;
        /* line-height: ; */
        /* margin-bottom: 10px; */
    }

    .author-box {
        font-size: 16px;
        margin-top: 20px;
    }

    .author-name {
        font-weight: bold;
    }

    .author-date {
        font-style: italic;
        font-size: 14px;
        color: #ccc;
    }
</style>