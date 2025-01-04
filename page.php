<?php 
get_header();
?>
    
<h1>
    <?php the_title(); ?>
</h1>

<div style="display:flex;">
    <?php 
    the_post_thumbnail(array(100, 100)); // Display the post thumbnail with specific size (height, width)
    ?>

    <?php
    // Get the post's featured image URL
    $imagepath = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
    ?>
    <img src="<?php echo esc_url($imagepath[0]); ?>" width="200">
    
    <div>
        <?php the_content(); ?>
    </div>
</div>

<!-- Page load time for debugging purposes -->
<br><br>
<div id="stats">
    <p><strong>Page Load time</strong> <span id="dom-content-loaded"></span></p>
</div>
<script>
    window.onload = function () {
        const performanceData = window.performance.timing;
        const navigationStart = performanceData.navigationStart;
        const domContentLoadedTime = performanceData.domContentLoadedEventEnd - navigationStart;
        const domContentLoadedTimeInSec = (domContentLoadedTime / 1000).toFixed(3);
        document.getElementById('dom-content-loaded').textContent = domContentLoadedTimeInSec + ' seconds';
    };
</script>

<?php
get_footer();
?>


Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil magnam in illum recusandae eveniet tempora harum earum ullam sapiente. Nostrum aperiam et maxime, harum aliquid odit doloremque eos dolor, ea nemo impedit accusantium facere hic illo beatae itaque perspiciatis architecto porro quas suscipit. Illum quam magni, soluta cumque asperiores quisquam iure ipsam a perferendis cupiditate reprehenderit modi at error, architecto nam assumenda eaque sed vel ea adipisci? Perferendis obcaecati iste itaque molestiae asperiores, amet autem. Sunt repellendus eveniet voluptatum dolore animi veritatis, asperiores, doloremque ut molestiae a amet ab modi quas unde. Veritatis laudantium doloribus pariatur omnis blanditiis laborum, hic saepe earum dolor fugiat harum commodi, possimus sint maiores excepturi facere deleniti cumque beatae repudiandae illum officiis nostrum ipsum accusantium consequatur! Beatae accusantium nihil, minima natus ex vel dicta tempore adipisci sed vitae id blanditiis ipsam inventore voluptatem! Eos ducimus provident ipsam atque alias molestiae perspiciatis recusandae rerum fugit sint in praesentium, qui blanditiis temporibus aliquid molestias reprehenderit distinctio magni nemo reiciendis impedit hic iste nulla ab? Architecto natus cumque cupiditate voluptatibus ut fugiat modi, a quisquam esse, reprehenderit odit perferendis dolorum sapiente eligendi, itaque incidunt harum rerum excepturi! Asperiores provident obcaecati tenetur amet pariatur similique, quod error, praesentium explicabo dolores illum doloribus ea a? Blanditiis soluta voluptates, tempora aut, fugit magnam inventore sunt fugiat quisquam velit dolor vitae mollitia error placeat delectus odio quam maiores atque vel et doloribus obcaecati culpa fuga? Provident molestiae minima eaque ullam excepturi molestias error qui, magni inventore repellendus esse sapiente, aut est adipisci rem nemo expedita dolores exercitationem dolorum. Fugit incidunt quibusdam debitis magni quo officia mollitia commodi, quod perspiciatis ipsum dolorem, ea facere. Maxime magni ad fugiat veritatis quo saepe earum mollitia, adipisci labore consectetur, iusto asperiores rerum aperiam molestias quaerat repellat facere repellendus quisquam ducimus? Aut sed amet nesciunt dicta, vel nulla numquam consectetur ab ad corporis animi harum, error ratione necessitatibus porro alias, reiciendis sequi itaque obcaecati deleniti quia. Possimus cupiditate harum consectetur eum ipsa ipsum temporibus maiores magni, pariatur labore eveniet. Quaerat itaque laboriosam assumenda magnam esse illum cumque asperiores, nostrum distinctio dignissimos minus quos ipsa sapiente modi, perferendis culpa cum beatae quasi, architecto recusandae incidunt voluptas voluptates ut reprehenderit. Aspernatur quam, minus sapiente rerum autem illum, tempora maiores excepturi accusantium dicta earum at qui, facilis ea quis placeat cum non! Minus debitis assumenda excepturi quas qui quis quasi optio deleniti, nisi facere commodi deserunt quisquam. Debitis esse temporibus rerum. Recusandae consequuntur, nam quam blanditiis molestias aliquam quidem, repellendus exercitationem laboriosam voluptatibus, iste aut quae? Ea molestiae iusto sint saepe deserunt harum libero similique doloribus nam laboriosam voluptatibus atque aliquid asperiores repellendus ad ab recusandae laborum omnis voluptatem voluptas, est repellat? Corrupti laboriosam totam possimus dolorum necessitatibus veritatis facilis consectetur, architecto illo ab assumenda quam quod animi velit commodi repellat amet ea tempora sed non saepe doloribus. Officiis, laudantium commodi voluptates doloribus repellendus nulla, quisquam aspernatur iure voluptatem laborum quibusdam soluta impedit. Cumque deleniti blanditiis dignissimos dicta facilis numquam voluptate facere ea ratione hic, aut ipsa tenetur mollitia saepe quasi vitae rerum, eius libero dolor asperiores! Nesciunt, quaerat cum excepturi sed dignissimos amet sequi nihil consequatur ullam accusantium, laborum temporibus expedita mollitia repudiandae fugit saepe. Harum praesentium aut ad officia, quasi voluptatem, ipsa nisi error mollitia dolores itaque quaerat doloremque! Pariatur delectus et ullam quasi, iste repellendus natus unde ad a cum dicta eveniet odit hic distinctio blanditiis officiis sequi eligendi quam consectetur! Repudiandae, animi excepturi consequuntur non nisi obcaecati assumenda doloribus delectus quod, saepe aliquid! Officia explicabo labore illo magnam, nihil provident quis maxime numquam culpa dolore amet, accusantium consequuntur quasi eum quia quas odit adipisci eligendi, sequi laudantium ratione architecto nulla minima. Libero, praesentium repudiandae aliquid, placeat repellendus eius deleniti tenetur nobis adipisci laudantium natus cumque nihil facilis sit inventore laborum. Delectus, nobis? Fugit, neque et error ad ratione qui vero magnam minus perspiciatis a similique ipsum architecto laboriosam quibusdam, ipsam perferendis. Ad beatae voluptatibus suscipit! Voluptatibus reprehenderit nesciunt deleniti rerum impedit. Aspernatur commodi dignissimos eius non vero quas omnis beatae neque quasi aliquid. Esse dolore veritatis accusamus cumque ratione fuga perferendis molestias ducimus tempora, quod temporibus! Debitis, recusandae iure! Accusantium veniam quae non vel deserunt nam. Maiores sapiente iusto, sint temporibus inventore beatae, nesciunt illo magnam odit eos eveniet quod nostrum unde veniam asperiores explicabo dignissimos, necessitatibus non. Nostrum, sequi libero reiciendis illum quibusdam deserunt accusantium. Culpa tempore repellendus possimus, magnam cumque dolores accusamus iure repudiandae quas autem provident atque, libero distinctio quidem. Esse quidem culpa laborum harum. Deleniti quod magni omnis consequuntur in commodi expedita pariatur assumenda recusandae sequi facilis molestiae neque alias, natus dignissimos! Porro suscipit nostrum nobis aut laudantium distinctio saepe. Sed id eos doloribus placeat iusto nesciunt molestiae cum, eaque impedit autem, alias culpa nam repellat provident quae eius quas asperiores eum? In consequuntur repellendus, minima sit impedit omnis adipisci dolorum quod quos ex itaque beatae optio sequi aliquid perspiciatis aut distinctio alias quasi! Debitis enim natus minus accusamus totam ea, quisquam porro iusto delectus dolorem molestias laborum error at vero aliquam hic perferendis molestiae, voluptate ipsa. Quae sequi quod laborum alias unde animi architecto aut voluptatum voluptates debitis odio deserunt voluptas, illum, minus, veniam eaque repellendus! Aperiam tempora illo, excepturi rem doloremque corrupti doloribus quam, ex nihil iure ipsum. Veniam quas iure dicta ipsum! Ipsam, aperiam ducimus, distinctio cum laborum molestiae fuga fugit dolorem in quis officiis aliquid repellat natus illum asperiores veniam doloribus nostrum! Magnam expedita harum alias fugit iusto, assumenda illum sunt odit asperiores rem aperiam corrupti a voluptates debitis et neque minus fuga, ducimus tenetur temporibus maiores voluptatum accusantium vitae! Libero accusamus saepe commodi, beatae rem blanditiis vero, laborum quaerat aliquid, temporibus voluptatum consequuntur voluptate odit impedit aliquam. Quibusdam, expedita consequuntur sapiente veniam, qui quia perferendis atque, distinctio aperiam ut eveniet laudantium dicta praesentium natus labore. Sunt nostrum inventore quae, dignissimos ut eius obcaecati quis sed velit error dolorem tempora nam ex magnam harum voluptate cumque nemo nesciunt unde. Dignissimos assumenda iure distinctio quod rem esse quo beatae dolores veniam aperiam delectus, ullam quas, culpa saepe voluptates ea nesciunt autem rerum tempore quia? Porro explicabo ut soluta dolorum quibusdam quas iste tempore voluptatem sed mollitia, sequi voluptatum repellat doloribus voluptatibus maiores reiciendis corporis distinctio minima eligendi enim incidunt nobis vel. Recusandae ab voluptas harum? Neque magni iure, illo adipisci voluptatem quibusdam assumenda vero. Exercitationem voluptates quo laudantium quae, omnis vel maiores nostrum tempore iste quisquam sapiente optio recusandae dignissimos facilis quia possimus placeat libero aspernatur iure similique quas voluptatem sed debitis rem. Inventore magni quasi obcaecati minima nostrum vitae! Recusandae hic labore ipsa, dolor earum reprehenderit, inventore perspiciatis quod molestiae illo, sit numquam rerum dolores voluptas in aspernatur quam? Sint aliquid id officia quaerat cum ipsum minima natus blanditiis consequatur voluptate. Nobis molestiae sed sapiente aut possimus impedit animi repudiandae dolorum, tempora blanditiis deleniti dignissimos excepturi ullam, recusandae provident doloremque quod. Dignissimos, corporis ipsa. Error ea corrupti vero iusto non accusamus deleniti facilis harum ducimus veniam nemo, doloribus debitis labore quia delectus laudantium magni ad minus in atque. Alias expedita culpa ea repellendus quo doloribus, laborum, deleniti repudiandae fugiat ab modi veritatis quas quam at fuga neque in delectus soluta perferendis assumenda provident repellat? Ipsum mollitia consectetur perspiciatis repellendus aliquam laudantium corrupti, sint at architecto a possimus explicabo corporis tempore. Repudiandae totam consequatur voluptatem corporis. Deleniti sed, ratione tempore voluptas dicta nisi ipsa totam perferendis veritatis libero corporis repellendus velit possimus quod vel pariatur unde omnis enim consectetur at! Minus magnam tenetur iusto in sequi nulla magni aspernatur odio, quasi provident. Illo similique ut nobis, facere ea ipsum odio, vel ducimus repellat consequuntur quia nesciunt! Facere quas exercitationem, commodi nostrum incidunt numquam enim autem praesentium sed laborum ratione ipsa. Ullam harum et excepturi aliquid placeat culpa nostrum velit perferendis doloremque laboriosam, eaque quae soluta. Eligendi, inventore pariatur? Obcaecati nulla saepe nesciunt non earum. Minus voluptate totam soluta maiores quod quaerat a, placeat deleniti quidem! Ad dolorum nesciunt perferendis rem consequuntur repellat sequi ex dicta, sapiente cumque corporis, voluptas eos laudantium vel omnis eligendi. Officia nostrum magnam asperiores quos repudiandae harum, ea quo distinctio aut suscipit libero laboriosam tenetur officiis ab odio a ipsam vero provident qui, cupiditate eius quae? Repudiandae consequatur eveniet quia, maxime perferendis modi quis eligendi? Reprehenderit eos vero est commodi suscipit praesentium temporibus. Molestias ex reprehenderit qui, veniam ea soluta architecto accusantium facere voluptate quasi labore ipsam excepturi atque. Doloremque earum dolor ipsum asperiores, ex pariatur tempora quod neque. Reiciendis similique ipsam sequi architecto rem nostrum, assumenda consequuntur veritatis quas excepturi voluptatibus soluta odio maxime illum eius recusandae incidunt? Vero nam accusantium fugiat tenetur mollitia beatae natus, atque nobis maiores sed eum inventore doloremque dignissimos in laboriosam officiis necessitatibus iusto ullam corrupti eius labore ipsa provident consequuntur culpa. Ut quis neque placeat ad, suscipit eveniet! Voluptas doloremque consequuntur ipsa necessitatibus quis itaque ea quasi, ut voluptatum nihil perspiciatis eius a nemo minus, culpa voluptatem. Accusamus alias similique nemo iste autem temporibus itaque placeat minima obcaecati voluptatum illo praesentium quidem, modi aliquam blanditiis rerum quis iure fuga in voluptas debitis excepturi. Sequi iure aperiam sed beatae delectus dolorem corrupti quasi dolore, animi, laborum adipisci aliquid magnam blanditiis dolores hic saepe neque fuga earum rem, sunt repellat? At tenetur odio aliquam atque necessitatibus, nemo, nobis voluptates nesciunt consequuntur praesentium assumenda! Veniam aliquam alias, odio itaque sit sunt praesentium culpa. Sapiente dignissimos quae ut neque aspernatur? Aut accusantium repudiandae eius tempore, pariatur consequatur perspiciatis cum magnam laudantium hic quos, est ullam earum officiis sint velit expedita voluptatum! Qui, asperiores. Laudantium voluptatibus deleniti omnis assumenda tempora esse itaque consequatur nemo velit. Eligendi nesciunt veritatis aliquid magni? Vero explicabo quos culpa dolorem necessitatibus maxime facere iure laboriosam eligendi repudiandae excepturi ipsam, veritatis officia ipsum impedit omnis animi at! Dolore voluptatum inventore, delectus ullam adipisci dolor impedit similique autem itaque nulla quam est eos distinctio velit fuga obcaecati tempore suscipit odio! Numquam hic expedita unde explicabo saepe vitae, nemo inventore cumque delectus natus consequuntur nihil voluptas consectetur doloribus provident alias aspernatur incidunt quos! Expedita rem minima, temporibus perferendis, labore laboriosam illo omnis doloribus eius iure explicabo mollitia exercitationem voluptates harum incidunt. Quisquam quidem tempore excepturi molestiae qui. Voluptatibus suscipit aspernatur magni modi quo architecto nobis corrupti possimus, dolores minima illum placeat incidunt cum, beatae a, omnis neque libero. Facere quisquam perspiciatis blanditiis itaque aspernatur quo? Labore maxime cupiditate minima dignissimos itaque obcaecati, illum necessitatibus. Assumenda voluptatibus minus aperiam eius provident dolores. Distinctio dicta obcaecati deleniti. Harum reiciendis a nam quos hic veniam! Officia deserunt mollitia, veritatis quisquam obcaecati iure ipsum voluptate doloremque, in assumenda magnam? Nam obcaecati soluta odio? Quod deserunt architecto tenetur, molestias facere necessitatibus numquam asperiores nisi quidem. Officiis molestias quasi explicabo neque dolorum iste impedit fugiat! Suscipit blanditiis cumque iste natus dicta consequatur expedita! Modi magni exercitationem ratione doloribus deleniti amet qui dolore maxime, nostrum facere nisi. Ea dolores, aspernatur inventore incidunt praesentium eveniet error labore est, doloribus nam dolorum iure nostrum voluptatibus, dolorem voluptates natus voluptate quis. Rem tenetur itaque perspiciatis dolorem! Odit at officia quas placeat quam incidunt mollitia nostrum amet aut ab consequatur nesciunt rem facilis sed asperiores optio cumque numquam dignissimos eligendi et, laudantium eaque nisi eius. Repudiandae consequuntur dicta corporis dolorem ipsam quo quod eius fugit quibusdam veniam atque, nulla suscipit ea. Magnam itaque doloremque perspiciatis tenetur labore consequatur possimus fuga, cum at architecto culpa maxime est libero excepturi debitis obcaecati repellendus! Atque, nihil, molestias dolor voluptates neque ea deserunt explicabo optio praesentium at enim excepturi quibusdam hic possimus. Sint nisi modi dolorum corrupti consequuntur, assumenda fugit quam unde, explicabo cupiditate temporibus delectus ipsum consequatur voluptatem, iusto excepturi rerum consectetur inventore ab. Possimus enim fuga excepturi sunt molestias, soluta odio aspernatur, cum ea inventore architecto deserunt consectetur est maiores eos odit natus quae tenetur autem adipisci dolores illum dolor suscipit quis. Laboriosam ipsum doloribus sint aliquam libero fugiat, a exercitationem accusantium nostrum architecto in unde nisi soluta minima ducimus similique eos et? Sed incidunt sunt, blanditiis cupiditate debitis corrupti ex ipsa aut quae, at ducimus reprehenderit perferendis ipsum asperiores amet recusandae aperiam dolore fuga sit illum nulla. Aperiam tenetur distinctio consectetur sed asperiores.