<?php

use App\Http\Controllers\CherkasyNewsController;
use App\Http\Controllers\ChernihivNewsController;
use App\Http\Controllers\ChernivtsiNewsController;
use App\Http\Controllers\CookieConsentController;
use App\Http\Controllers\CorporationController;
use App\Http\Controllers\DniproNewsController;
use App\Http\Controllers\HarkivNewsController;
use App\Http\Controllers\HmelnytskiyNewsController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\IvanoFrankivskNewsController;
use App\Http\Controllers\KhersonNewsController;
use App\Http\Controllers\KirovogradNewsController;
use App\Http\Controllers\KyivNewsController;
use App\Http\Controllers\LineNewsController;
use App\Http\Controllers\LvivNewsController;
use App\Http\Controllers\MykolayivNewsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsTodayController;
use App\Http\Controllers\OdesaNewsController;
use App\Http\Controllers\PoltavaNewsController;
use App\Http\Controllers\RivneNewsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\SumyNewsController;
use App\Http\Controllers\TernopilNewsController;
use App\Http\Controllers\VinnytsaNewsController;
use App\Http\Controllers\VolynskNewsController;
use App\Http\Controllers\ZakarpatskNewsController;
use App\Http\Controllers\ZaporizhzhiaNewsController;
use App\Http\Controllers\ZhytomyrNewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomepageController::class, 'index'])->name('homepage.index');
Route::post('/accept-cookies', [CookieConsentController::class, 'setCookieAndAccept'])->name('accept-cookies');
Route::post('/cookie/revoke', 'CookieConsentController@revokeCookie')->name('cookie.revoke');

Route::get('/news/{url}', [NewsController::class, 'index'])->name('news.index');
Route::get('/news-today', [NewsTodayController::class, 'index'])->name('news-today.index');
Route::get('/news', [LineNewsController::class, 'index'])->name('news.line');
Route::get('/search', [SearchController::class, 'index'])->name('search.index');

// Vinnytsa
Route::get('/vinnytsa', [VinnytsaNewsController::class, 'vinnytsaHome'])->name('vinnytsa.index');
Route::get('/zhmerynka', [VinnytsaNewsController::class, 'zhmerynkaHome'])->name('zhmerynka.index');
Route::get('/mohyliv-podilskyi', [VinnytsaNewsController::class, 'mohylivPodilskyiHome'])->name('mohyliv-podilskyi.index');
Route::get('/hmilnyk', [VinnytsaNewsController::class, 'hmilnykHome'])->name('hmilnyk.index');
Route::get('/gaysin', [VinnytsaNewsController::class, 'gaysinHome'])->name('gaysin.index');
Route::get('/kozyatyn', [VinnytsaNewsController::class, 'koziatynHome'])->name('kozyatyn.index');
Route::get('/ladyzhin', [VinnytsaNewsController::class, 'ladyzhynHome'])->name('ladyzhin.index');

// Kyiv
Route::get('/kyiv', [KyivNewsController::class, 'kyivHome'])->name('kyiv.index');
Route::get('/berezan', [KyivNewsController::class, 'berezanHome'])->name('berezan.index');
Route::get('/bilacerkva', [KyivNewsController::class, 'bilacerkvaHome'])->name('bilacerkva.index');
Route::get('/boryspil', [KyivNewsController::class, 'boryspilHome'])->name('boryspil.index');
Route::get('/boyarka', [KyivNewsController::class, 'boyarkaHome'])->name('boyarka.index');
Route::get('/brovary', [KyivNewsController::class, 'brovaryHome'])->name('brovary.index');
Route::get('/bucha', [KyivNewsController::class, 'buchaHome'])->name('bucha.index');
Route::get('/fastiv', [KyivNewsController::class, 'fastivHome'])->name('fastiv.index');
Route::get('/irpin', [KyivNewsController::class, 'irpinHome'])->name('irpin.index');
Route::get('/obukhiv', [KyivNewsController::class, 'obukhivHome'])->name('obukhiv.index');
Route::get('/pereyaslav', [KyivNewsController::class, 'pereyaslavHome'])->name('pereyaslav.index');
Route::get('/skvyra', [KyivNewsController::class, 'skvyraHome'])->name('skvyra.index');
Route::get('/slavutych', [KyivNewsController::class, 'slavutychHome'])->name('slavutych.index');
Route::get('/vasylkiv', [KyivNewsController::class, 'vasylkivHome'])->name('vasylkiv.index');
Route::get('/vyshhorod', [KyivNewsController::class, 'vyshhorodHome'])->name('vyshhorod.index');
Route::get('/vyshneve', [KyivNewsController::class, 'vyshneveHome'])->name('vyshneve.index');
Route::get('/yagotyn', [KyivNewsController::class, 'yagotynHome'])->name('yagotyn.index');

Route::get('/kyiv/news/', [KyivNewsController::class, 'kyivLine'])->name('kyiv.line');
Route::get('/kyiv/news/{url}', [KyivNewsController::class, 'News'])->name('kyiv.news');
Route::get('/kyiv/news/', [KyivNewsController::class, 'kyivLine'])->name('kyiv.line');
Route::get('/berezan/news/{url}', [KyivNewsController::class, 'kyivNews'])->name('kyiv.news');
Route::get('/bilacerkva/news/', [KyivNewsController::class, 'bilacerkvaLine'])->name('bilacerkva.line');
Route::get('/bilacerkva/news/{url}', [KyivNewsController::class, 'bilacerkvaNews'])->name('bilacerkva.news');
Route::get('/boryspil/news/', [KyivNewsController::class, 'boryspilLine'])->name('boryspil.line');
Route::get('/boryspil/news/{url}', [KyivNewsController::class, 'boryspilNews'])->name('boryspil.news');
Route::get('/boyarka/news/', [KyivNewsController::class, 'boyarkaLine'])->name('boyarka.line');
Route::get('/boyarka/news/{url}', [KyivNewsController::class, 'boyarkaNews'])->name('boyarka.news');
Route::get('/brovary/news/', [KyivNewsController::class, 'brovaryLine'])->name('brovary.line');
Route::get('/brovary/news/{url}', [KyivNewsController::class, 'brovaryNews'])->name('brovary.news');
Route::get('/bucha/news/', [KyivNewsController::class, 'buchaLine'])->name('bucha.line');
Route::get('/bucha/news/{url}', [KyivNewsController::class, 'buchaNews'])->name('bucha.news');
Route::get('/fastiv/news/', [KyivNewsController::class, 'fastivLine'])->name('fastiv.line');
Route::get('/fastiv/news/{url}', [KyivNewsController::class, 'fastivNews'])->name('fastiv.news');
Route::get('/irpin/news/', [KyivNewsController::class, 'irpinLine'])->name('irpin.line');
Route::get('/irpin/news/{url}', [KyivNewsController::class, 'irpinNews'])->name('irpin.news');
Route::get('/obukhiv/news/', [KyivNewsController::class, 'obukhivLine'])->name('obukhiv.line');
Route::get('/obukhiv/news/{url}', [KyivNewsController::class, 'obukhivNews'])->name('obukhiv.news');
Route::get('/pereyaslav/news/', [KyivNewsController::class, 'pereyaslavLine'])->name('pereyaslav.line');
Route::get('/pereyaslav/news/{url}', [KyivNewsController::class, 'pereyaslavNews'])->name('pereyaslav.news');
Route::get('/skvyra/news/', [KyivNewsController::class, 'skvyraLine'])->name('skvyra.line');
Route::get('/skvyra/news/{url}', [KyivNewsController::class, 'skvyraNews'])->name('skvyra.news');
Route::get('/slavutych/news/', [KyivNewsController::class, 'slavutychLine'])->name('slavutych.line');
Route::get('/slavutych/news/{url}', [KyivNewsController::class, 'slavutychNews'])->name('slavutych.news');
Route::get('/vasylkiv/news/', [KyivNewsController::class, 'vasylkivLine'])->name('vasylkiv.line');
Route::get('/vasylkiv/news/{url}', [KyivNewsController::class, 'vasylkivNews'])->name('vasylkiv.news');
Route::get('/vyshhorod/news/', [KyivNewsController::class, 'vyshhorodLine'])->name('vyshhorod.line');
Route::get('/vyshhorod/news/{url}', [KyivNewsController::class, 'vyshhorodNews'])->name('vyshhorod.news');
Route::get('/vyshneve/news/', [KyivNewsController::class, 'vyshneveLine'])->name('vyshneve.line');
Route::get('/vyshneve/news/{url}', [KyivNewsController::class, 'vyshneveNews'])->name('vyshneve.news');
Route::get('/yagotyn/news/', [KyivNewsController::class, 'yagotynLine'])->name('yagotyn.line');
Route::get('/yagotyn/news/{url}', [KyivNewsController::class, 'yagotynNews'])->name('yagotyn.news');


// Cherkasy
Route::get('/cherkasy', [CherkasyNewsController::class, 'cherkasyHome'])->name('cherkasy.index');
Route::get('/kaniv', [CherkasyNewsController::class, 'kanivHome'])->name('kaniv.index');
Route::get('/smila', [CherkasyNewsController::class, 'smilaHome'])->name('smila.index');
Route::get('/uman', [CherkasyNewsController::class, 'umanHome'])->name('uman.index');
Route::get('/vatutine', [CherkasyNewsController::class, 'vatutineHome'])->name('vatutine.index');
Route::get('/zolotonosha', [CherkasyNewsController::class, 'zolotonoshaHome'])->name('zolotonosha.index');
Route::get('/zvenyhorodka', [CherkasyNewsController::class, 'zvenyhorodkaHome'])->name('zvenyhorodka.index');
// Chernihiv
Route::get('/bahmach', [ChernihivNewsController::class, 'bahmachHome'])->name('bahmach.index');
Route::get('/chernihiv', [ChernihivNewsController::class, 'chernihivHome'])->name('chernihiv.index');
Route::get('/nizhin', [ChernihivNewsController::class, 'nizhinHome'])->name('nizhin.index');
Route::get('/pryluki', [ChernihivNewsController::class, 'prylukiHome'])->name('pryluki.index');
// Chernivtsi
Route::get('/chernivtsi', [ChernivtsiNewsController::class, 'chernivtsiHome'])->name('chernivtsi.index');
// Harkiv
Route::get('/balaklia', [HarkivNewsController::class, 'balakliaHome'])->name('balaklia.index');
Route::get('/chuguyiv', [HarkivNewsController::class, 'chuguyivHome'])->name('chuguyiv.index');
Route::get('/dergachi', [HarkivNewsController::class, 'dergachiHome'])->name('dergachi.index');
Route::get('/harkiv', [HarkivNewsController::class, 'harkivHome'])->name('harkiv.index');
Route::get('/izum', [HarkivNewsController::class, 'izumHome'])->name('izum.index');
Route::get('/krasnograd', [HarkivNewsController::class, 'krasnogradHome'])->name('krasnograd.index');
Route::get('/kupyansk', [HarkivNewsController::class, 'kupyanskHome'])->name('kupyansk.index');
Route::get('/lozova', [HarkivNewsController::class, 'lozovaHome'])->name('lozova.index');
Route::get('/lubotin', [HarkivNewsController::class, 'lubotinHome'])->name('lubotin.index');
Route::get('/merefa', [HarkivNewsController::class, 'merefaHome'])->name('merefa.index');
Route::get('/pervomayskiy', [HarkivNewsController::class, 'pervomayskiyHome'])->name('pervomayskiy.index');
Route::get('/vovchansk', [HarkivNewsController::class, 'vovchanskHome'])->name('vovchansk.index');
// Volynsk
Route::get('/kovel', [VolynskNewsController::class, 'kovelHome'])->name('kovel.index');
Route::get('/lutsk', [VolynskNewsController::class, 'lutskHome'])->name('lutsk.index');
Route::get('/novovolynsk', [VolynskNewsController::class, 'novovolynskHome'])->name('novovolynsk.index');
Route::get('/volodymyr-volynskiy', [VolynskNewsController::class, 'volodymyrVolynskiyHome'])->name('volodymyr-volynskiy.index');
// Zhytomyr
Route::get('/berdychiv', [ZhytomyrNewsController::class, 'berdychivHome'])->name('berdychiv.index');
Route::get('/korosten', [ZhytomyrNewsController::class, 'korostenHome'])->name('korosten.index');
Route::get('/korostyshiv', [ZhytomyrNewsController::class, 'korostyshivHome'])->name('korostyshiv.index');
Route::get('/malyn', [ZhytomyrNewsController::class, 'malynHome'])->name('malyn.index');
Route::get('/novohrad-volynskiy', [ZhytomyrNewsController::class, 'novohradVolynskiyHome'])->name('novohrad-volynskiy.index');
Route::get('/zhytomyr', [ZhytomyrNewsController::class, 'zhytomyrHome'])->name('zhytomyr.index');
// Zakarpatsk
Route::get('/beregove', [ZakarpatskNewsController::class, 'beregoveHome'])->name('beregove.index');
Route::get('/hust', [ZakarpatskNewsController::class, 'hustHome'])->name('hust.index');
Route::get('/mukachevo', [ZakarpatskNewsController::class, 'mukachevoHome'])->name('mukachevo.index');
Route::get('/uzhhorod', [ZakarpatskNewsController::class, 'uzhhorodHome'])->name('uzhhorod.index');
Route::get('/vinohradiv', [ZakarpatskNewsController::class, 'vinohradivHome'])->name('vinohradiv.index');
// Zaporizhzhia
Route::get('/berdyansk', [ZaporizhzhiaNewsController::class, 'berdyanskHome'])->name('berdyansk.index');
Route::get('/dniprorudne', [ZaporizhzhiaNewsController::class, 'dniprorudneHome'])->name('dniprorudne.index');
Route::get('/energodar', [ZaporizhzhiaNewsController::class, 'energodarHome'])->name('energodar.index');
Route::get('/melitopol', [ZaporizhzhiaNewsController::class, 'melitopolHome'])->name('melitopol.index');
Route::get('/pology', [ZaporizhzhiaNewsController::class, 'pologyHome'])->name('pology.index');
Route::get('/tokmak', [ZaporizhzhiaNewsController::class, 'tokmakHome'])->name('tokmak.index');
Route::get('/zaporizhzhia', [ZaporizhzhiaNewsController::class, 'zaporizhzhiaHome'])->name('zaporizhzhia.index');
// Ivano-Frankivsk
Route::get('/dolyna', [IvanoFrankivskNewsController::class, 'dolynaHome'])->name('dolyna.index');
Route::get('/ivano-frankivsk', [IvanoFrankivskNewsController::class, 'ivanoFrankivskHome'])->name('ivano-frankivsk.index');
Route::get('/kalush', [IvanoFrankivskNewsController::class, 'kalushHome'])->name('kalush.index');
Route::get('/kolomya', [IvanoFrankivskNewsController::class, 'kolomyaHome'])->name('kolomya.index');
Route::get('/nadvirna', [IvanoFrankivskNewsController::class, 'nadvirnaHome'])->name('nadvirna.index');
// Kirovograd
Route::get('/kropyvnytskiy', [KirovogradNewsController::class, 'kropyvnytskiyHome'])->name('kropyvnytskiy.index');
Route::get('/olexandriya', [KirovogradNewsController::class, 'olexandriyaHome'])->name('olexandriya.index');
Route::get('/svitlovodsk', [KirovogradNewsController::class, 'svitlovodskHome'])->name('svitlovodsk.index');
Route::get('/znamyanka', [KirovogradNewsController::class, 'znamyankaHome'])->name('znamyanka.index');
// Lviv
Route::get('/boryslav', [LvivNewsController::class, 'boryslavHome'])->name('boryslav.index');
Route::get('/brody', [LvivNewsController::class, 'brodyHome'])->name('brody.index');
Route::get('/chervonograd', [LvivNewsController::class, 'chervonogradHome'])->name('chervonograd.index');
Route::get('/drohobych', [LvivNewsController::class, 'drohobychHome'])->name('drohobych.index');
Route::get('/lviv', [LvivNewsController::class, 'lvivHome'])->name('lviv.index');
Route::get('/novoyavorivsk', [LvivNewsController::class, 'novoyavorivskHome'])->name('novoyavorivsk.index');
Route::get('/noviy-rozdil', [LvivNewsController::class, 'noviyRozdilHome'])->name('noviy-rozdil.index');
Route::get('/sambir', [LvivNewsController::class, 'sambirHome'])->name('sambir.index');
Route::get('/sokal', [LvivNewsController::class, 'sokalHome'])->name('sokal.index');
Route::get('/stebnyk', [LvivNewsController::class, 'stebnykHome'])->name('stebnyk.index');
Route::get('/striy', [LvivNewsController::class, 'striyHome'])->name('striy.index');
Route::get('/truskavets', [LvivNewsController::class, 'truskavetsHome'])->name('truskavets.index');
Route::get('/zolochiv', [LvivNewsController::class, 'zolochivHome'])->name('zolochiv.index');
// Mykolayiv
Route::get('/mykolayiv', [MykolayivNewsController::class, 'mykolayivHome'])->name('mykolayiv.index');
Route::get('/pervomaisk', [MykolayivNewsController::class, 'pervomaiskHome'])->name('pervomaisk.index');
Route::get('/voznesensk', [MykolayivNewsController::class, 'voznesenskHome'])->name('voznesensk.index');
Route::get('/yuzhnoukrainsk', [MykolayivNewsController::class, 'yuzhnoukrainskHome'])->name('yuzhnoukrainsk.index');
// Poltava
Route::get('/hadiach', [PoltavaNewsController::class, 'hadiachHome'])->name('hadiach.index');
Route::get('/horishni-plavni', [PoltavaNewsController::class, 'horishniPlavniHome'])->name('horishni-plavni.index');
Route::get('/kremenchuk', [PoltavaNewsController::class, 'kremenchukHome'])->name('kremenchuk.index');
Route::get('/lubny', [PoltavaNewsController::class, 'lubnyHome'])->name('lubny.index');
Route::get('/myrhorod', [PoltavaNewsController::class, 'myrhorodHome'])->name('myrhorod.index');
Route::get('/poltava', [PoltavaNewsController::class, 'poltavaHome'])->name('poltava.index');
// Rivne
Route::get('/dubno', [RivneNewsController::class, 'dubnoHome'])->name('dubno.index');
Route::get('/kostopil', [RivneNewsController::class, 'kostopilHome'])->name('kostopil.index');
Route::get('/rivne', [RivneNewsController::class, 'rivneHome'])->name('rivne.index');
Route::get('/sarny', [RivneNewsController::class, 'sarnyHome'])->name('sarny.index');
Route::get('/varash', [RivneNewsController::class, 'varashHome'])->name('varash.index');
Route::get('/zdolbuniv', [RivneNewsController::class, 'zdolbunivHome'])->name('zdolbuniv.index');
// Sumy
Route::get('/gluhiv', [SumyNewsController::class, 'gluhivHome'])->name('gluhiv.index');
Route::get('/konotop', [SumyNewsController::class, 'konotopHome'])->name('konotop.index');
Route::get('/krolevets', [SumyNewsController::class, 'krolevetsHome'])->name('krolevets.index');
Route::get('/lebedyn', [SumyNewsController::class, 'lebedynHome'])->name('lebedyn.index');
Route::get('/ohtyrka', [SumyNewsController::class, 'ohtyrkaHome'])->name('ohtyrka.index');
Route::get('/romny', [SumyNewsController::class, 'romnyHome'])->name('romny.index');
Route::get('/shostka', [SumyNewsController::class, 'shostkaHome'])->name('shostka.index');
Route::get('/sumy', [SumyNewsController::class, 'sumyHome'])->name('sumy.index');
Route::get('/trostyanets', [SumyNewsController::class, 'trostyanetsHome'])->name('trostyanets.index');
// Ternopil
Route::get('/chortkiv', [TernopilNewsController::class, 'chortkivHome'])->name('chortkiv.index');
Route::get('/kremenets', [TernopilNewsController::class, 'kremenetsHome'])->name('kremenets.index');
Route::get('/ternopil', [TernopilNewsController::class, 'ternopilHome'])->name('ternopil.index');
// Kherson
Route::get('/henichesk', [KhersonNewsController::class, 'henicheskHome'])->name('henichesk.index');
Route::get('/kahovka', [KhersonNewsController::class, 'kahovkaHome'])->name('kahovka.index');
Route::get('/kherson', [KhersonNewsController::class, 'khersonHome'])->name('kherson.index');
Route::get('/nova-kakhovka', [KhersonNewsController::class, 'novaKakhovkaHome'])->name('nova-kakhovka.index');
Route::get('/oleshki', [KhersonNewsController::class, 'oleshkiHome'])->name('oleshki.index');
Route::get('/skadovsk', [KhersonNewsController::class, 'skadovskHome'])->name('skadovsk.index');
// Hmelnytskiy
Route::get('/hmelnytskiy', [HmelnytskiyNewsController::class, 'hmelnytskiyHome'])->name('hmelnytskiy.index');
Route::get('/kamyanets-podilsky', [HmelnytskiyNewsController::class, 'kamyanetsPodilskyHome'])->name('kamyanets-podilsky.index');
Route::get('/krasyliv', [HmelnytskiyNewsController::class, 'krasylivHome'])->name('krasyliv.index');
Route::get('/netishin', [HmelnytskiyNewsController::class, 'netishinHome'])->name('netishin.index');
Route::get('/polonne', [HmelnytskiyNewsController::class, 'polonneHome'])->name('polonne.index');
Route::get('/shepetivka', [HmelnytskiyNewsController::class, 'shepetivkaHome'])->name('shepetivka.index');
Route::get('/slavuta', [HmelnytskiyNewsController::class, 'slavutaHome'])->name('slavuta.index');
Route::get('/starokostyntynivka', [HmelnytskiyNewsController::class, 'starokostyntynivkaHome'])->name('starokostyntynivka.index');
Route::get('/volochysk', [HmelnytskiyNewsController::class, 'volochyskHome'])->name('volochysk.index');
// Route::get('')

// Dnipro
Route::get('/dnipro', [DniproNewsController::class, 'dniproHome'])->name('dnipro.index');
Route::get('/kamianske', [DniproNewsController::class, 'kamianskeHome'])->name('kamianske.index');
Route::get('/kryvyi-rih', [DniproNewsController::class, 'kryvyiRihHome'])->name('kryvyi-rih.index');
Route::get('/marganets', [DniproNewsController::class, 'marganetsHome'])->name('marganets.index');
Route::get('/nikopol', [DniproNewsController::class, 'nikopolHome'])->name('nikopol.index');
Route::get('/novomoskovsk', [DniproNewsController::class, 'novomoskovskHome'])->name('novomoskovsk.index');
Route::get('/pavlograd', [DniproNewsController::class, 'pavlogradHome'])->name('pavlograd.index');
Route::get('/pershotravensk', [DniproNewsController::class, 'pershotravenskHome'])->name('pershotravensk.index');
Route::get('/pokrov', [DniproNewsController::class, 'pokrovHome'])->name('pokrov.index');
Route::get('/pyatihatky', [DniproNewsController::class, 'pyatihatkyHome'])->name('pyatihatky.index');
Route::get('/sinelnikovo', [DniproNewsController::class, 'sinelnikovoHome'])->name('sinelnikovo.index');
Route::get('/ternivka', [DniproNewsController::class, 'ternivkaHome'])->name('ternivka.index');
Route::get('/vilnohorsk', [DniproNewsController::class, 'vilnohorskHome'])->name('vilnohorsk.index');
Route::get('/zhovti-vody', [DniproNewsController::class, 'zhovtiVodyHome'])->name('zhovti-vody.index');

Route::get('/dnipro/news/', [DniproNewsController::class, 'dniproLine'])->name('dnipro.line');
Route::get('/kamianske/news/', [DniproNewsController::class, 'kamianskeLine'])->name('kamianske.line');
Route::get('/kryvyi-rih/news/', [DniproNewsController::class, 'kryvyiRihLine'])->name('kryvyi-rih.line');
Route::get('/marganets/news/', [DniproNewsController::class, 'marganetsLine'])->name('marganets.line');
Route::get('/nikopol/news/', [DniproNewsController::class, 'nikopolLine'])->name('nikopol.line');
Route::get('/novomoskovsk/news/', [DniproNewsController::class, 'novomoskovskLine'])->name('novomoskovsk.line');
Route::get('/pavlograd/news/', [DniproNewsController::class, 'pavlogradLine'])->name('pavlograd.line');
Route::get('/pershotravensk/news/', [DniproNewsController::class, 'pershotravenskLine'])->name('pershotravensk.line');
Route::get('/pokrov/news/', [DniproNewsController::class, 'pokrovLine'])->name('pokrov.line');
Route::get('/pyatihatky/news/', [DniproNewsController::class, 'pyatihatkyLine'])->name('pyatihatky.line');
Route::get('/sinelnikovo/news/', [DniproNewsController::class, 'sinelnikovoLine'])->name('sinelnikovo.line');
Route::get('/ternivka/news/', [DniproNewsController::class, 'ternivkaLine'])->name('ternivka.line');
Route::get('/vilnohorsk/news/', [DniproNewsController::class, 'vilnohorskLine'])->name('vilnohorsk.line');
Route::get('/zhovti-vody/news/', [DniproNewsController::class, 'zhovtiVodyLine'])->name('zhovti-vody.line');

Route::get('/dnipro/news/{url}', [DniproNewsController::class, 'dniproNews'])->name('dnipro.news');
Route::get('/kamianske/news/{url}', [DniproNewsController::class, 'kamianskeNews'])->name('kamianske.news');
Route::get('/kryvyi-rih/news/{url}', [DniproNewsController::class, 'kryvyiRihNews'])->name('kryvyi-rih.news');
Route::get('/marganets/news/{url}', [DniproNewsController::class, 'marganetsNews'])->name('marganets.news');
Route::get('/nikopol/news/{url}', [DniproNewsController::class, 'nikopolNews'])->name('nikopol.news');
Route::get('/novomoskovsk/news/{url}', [DniproNewsController::class, 'novomoskovskNews'])->name('novomoskovsk.news');
Route::get('/pavlograd/news/{url}', [DniproNewsController::class, 'pavlogradNews'])->name('pavlograd.news');
Route::get('/pershotravensk/news/{url}', [DniproNewsController::class, 'pershotravenskNews'])->name('pershotravensk.news');
Route::get('/pokrov/news/{url}', [DniproNewsController::class, 'pokrovNews'])->name('pokrov.news');
Route::get('/pyatihatky/news/{url}', [DniproNewsController::class, 'pyatihatkyNews'])->name('pyatihatky.news');
Route::get('/sinelnikovo/news/{url}', [DniproNewsController::class, 'sinelnikovoNews'])->name('sinelnikovo.news');
Route::get('/ternivka/news/{url}', [DniproNewsController::class, 'ternivkaNews'])->name('ternivka.news');
Route::get('/vilnohorsk/news/{url}', [DniproNewsController::class, 'vilnohorskNews'])->name('vilnohorsk.news');
Route::get('/zhovti-vody/news/{url}', [DniproNewsController::class, 'zhovtiVodyNews'])->name('zhovti-vody.news');

// Odessa
Route::get('/bilgorod-dnistrovsky', [OdesaNewsController::class, 'bilgorodDnistrovskyHome'])->name('bilgorod.index');
Route::get('/chornomorsk', [OdesaNewsController::class, 'chornomorskHome'])->name('chornomorsk.index');
Route::get('/izmail', [OdesaNewsController::class, 'izmailHome'])->name('izmail.index');
Route::get('/kiliya', [OdesaNewsController::class, 'kiliyaHome'])->name('kiliya.index');
Route::get('/odesa', [OdesaNewsController::class, 'odesaHome'])->name('odesa.index');
Route::get('/podilsk', [OdesaNewsController::class, 'podilskHome'])->name('podilsk.index');
Route::get('/podilsk/search', [SearchController::class, 'podilskSearch'])->name('podilsk.search');
Route::get('/teplodar', [OdesaNewsController::class, 'teplodarHome'])->name('teplodar.index');
Route::get('/youzhne', [OdesaNewsController::class, 'youzhneHome'])->name('youzhne.index');

Route::get('/bilgorod-dnistrovsky/news/', [OdesaNewsController::class, 'bilgorodDnistrovskyLine'])->name('bilgorod.line');
Route::get('/chornomorsk/news/', [OdesaNewsController::class, 'chornomorskLine'])->name('chornomorsk.line');
Route::get('/izmail/news/', [OdesaNewsController::class, 'izmailLine'])->name('izmail.line');
Route::get('/kiliya/news/', [OdesaNewsController::class, 'kiliyaLine'])->name('kiliya.line');
Route::get('/odesa/news/', [OdesaNewsController::class, 'odesaLine'])->name('odesa.line');
Route::get('/podilsk/news/', [OdesaNewsController::class, 'podilskLine'])->name('podilsk.line');
Route::get('/teplodar/news/', [OdesaNewsController::class, 'teplodarLine'])->name('teplodar.line');
Route::get('/youzhne/news/', [OdesaNewsController::class, 'youzhneLine'])->name('youzhne.line');

// Route::get('//news/', [OdesaNewsController::class, 'Line'])->name('.line');

Route::get('/bilgorod-dnistrovsky/news/{url}', [OdesaNewsController::class, 'bilgorodDnistrovskyNews'])->name('bilgorod.news');
Route::get('/chornomorsk/news/{url}', [OdesaNewsController::class, 'chornomorskNews'])->name('chornomorsk.news');
Route::get('/izmail/news/{url}', [OdesaNewsController::class, 'izmailNews'])->name('izmail.news');
Route::get('/kiliya/news/{url}', [OdesaNewsController::class, 'kiliyaNews'])->name('kiliya.news');
Route::get('/odesa/news/{url}', [OdesaNewsController::class, 'odesaNews'])->name('odesa.news');
Route::get('/podilsk/news/{url}', [OdesaNewsController::class, 'podilskNews'])->name('podilsk.news');
Route::get('/teplodar/news/{url}', [OdesaNewsController::class, 'teplodarNews'])->name('teplodar.news');
Route::get('/youzhne/news/{url}', [OdesaNewsController::class, 'youzhneNews'])->name('youzhne.news');
// Route::get('//news/{url}', [OdesaNewsController::class, 'News'])->name('.news');

Route::get('/teplodar/search', [SearchController::class, 'teplodarSearch'])->name('teplodar.search');

// Sections
Route::get('/usa', [SectionsController::class, 'usa'])->name('usa.index');
Route::get('/vijna', [SectionsController::class, 'vijna'])->name('vijna.index');
Route::get('/europe', [SectionsController::class, 'europe'])->name('europe.index');
Route::get('/china', [SectionsController::class, 'china'])->name('china.index');
Route::get('/suspilstvo', [SectionsController::class, 'suspilstvo'])->name('suspilstvo.index');
Route::get('/biznes', [SectionsController::class, 'biznes'])->name('biznes.index');
Route::get('/polityka', [SectionsController::class, 'polityka'])->name('polityka.index');
Route::get('/ekonomika', [SectionsController::class, 'ekonomika'])->name('ekonomika.index');
Route::get('/analityka', [SectionsController::class, 'analityka'])->name('analityka.index');
Route::get('/technologies', [SectionsController::class, 'technologies'])->name('technologies.index');
Route::get('/nauka', [SectionsController::class, 'nauka'])->name('nauka.index');
Route::get('/kultura', [SectionsController::class, 'kultura'])->name('kultura.index');
Route::get('/ekolohiia', [SectionsController::class, 'ekolohiia'])->name('ekolohiia.index');
Route::get('/finance', [SectionsController::class, 'finance'])->name('finance.index');
Route::get('/vlada', [SectionsController::class, 'vlada'])->name('vlada.index');
Route::get('/sport', [SectionsController::class, 'sport'])->name('sport.index');
Route::get('/history', [SectionsController::class, 'history'])->name('history.index');
Route::get('/pryhody', [SectionsController::class, 'pryhody'])->name('pryhody.index');
Route::get('/musick', [SectionsController::class, 'musick'])->name('musick.index');
Route::get('/fashion', [SectionsController::class, 'fashion'])->name('fashion.index');
Route::get('/kino', [SectionsController::class, 'kino'])->name('kino.index');
Route::get('/interviu', [SectionsController::class, 'interviu'])->name('interviu.index');
Route::get('/dumky', [SectionsController::class, 'dumky'])->name('dumky.index');
Route::get('/auto', [SectionsController::class, 'auto'])->name('auto.index');
Route::get('/ihry', [SectionsController::class, 'ihry'])->name('ihry.index');
Route::get('/education', [SectionsController::class, 'education'])->name('education.index');
Route::get('/kulinariia', [SectionsController::class, 'kulinariia'])->name('kulinariia.index');
Route::get('/health', [SectionsController::class, 'health'])->name('health.index');
Route::get('/parenting', [SectionsController::class, 'parenting'])->name('parenting.index');
Route::get('/real-estate', [SectionsController::class, 'real_estate'])->name('real-estate.index');
Route::get('/traveling', [SectionsController::class, 'traveling'])->name('traveling.index');
Route::get('/svitovi-novyny', [SectionsController::class, 'svitovi_novyny'])->name('svitovi-novyny.index');
Route::get('/north-america', [SectionsController::class, 'north_america'])->name('north-america.index');
Route::get('/south-america', [SectionsController::class, 'south_america'])->name('south-america.index');
Route::get('/middle-east', [SectionsController::class, 'middle_east'])->name('middle-east.index');
Route::get('/pacific-region', [SectionsController::class, 'pacific_region'])->name('pacific-region.index');
Route::get('/africa', [SectionsController::class, 'africa'])->name('africa.index');
Route::get('/pres-reliz', [SectionsController::class, 'pres_reliz'])->name('pres-reliz.index');
Route::get('/ofitsijno', [SectionsController::class, 'ofitsijno'])->name('ofitsijno.index');
Route::get('/novyny-biznesu', [SectionsController::class, 'novyny_biznesu'])->name('novyny-biznesu.index');
Route::get('/politychni-novyny', [SectionsController::class, 'politychni_novyny'])->name('politychni-novyny.index');

// Corporation Section
Route::get('/corporate-section', [CorporationController::class, 'corporate_section'])->name('corporate_section.index');
Route::get('/politics', [CorporationController::class, 'politics'])->name('politics.index');
Route::get('/legal-information', [CorporationController::class, 'legal_information'])->name('legal_information.index');
Route::get('/more-about-us', [CorporationController::class, 'more_about_us'])->name('more_about_us.index');
Route::get('/about-us', [CorporationController::class, 'about_us'])->name('about_us.index');
Route::get('/maps-ua', [CorporationController::class, 'maps_ua'])->name('maps_ua.index');
Route::get('/advertising', [CorporationController::class, 'advertising'])->name('advertising.index');
Route::get('/partnership', [CorporationController::class, 'partnership'])->name('partnership.index');
Route::get('/work-with-us', [CorporationController::class, 'work_with_us'])->name('work_with_us.index');
Route::get('/editorship', [CorporationController::class, 'editorship'])->name('editorship.index');
Route::get('/subscription', [CorporationController::class, 'subscription'])->name('subscription.index');
Route::get('/privacy-politics', [CorporationController::class, 'privacy_politics'])->name('privacy_politics.index');
Route::get('/editorial-politics', [CorporationController::class, 'editorial_politics'])->name('editorial_politics.index');
Route::get('/cookie-politics', [CorporationController::class, 'cookie_politics'])->name('cookie_politics.index');
Route::get('/service', [CorporationController::class, 'service'])->name('service.index');
Route::get('/content', [CorporationController::class, 'content'])->name('content.index');
Route::get('/terms-of-sale', [CorporationController::class, 'terms_of_sale'])->name('terms_of_sale.index');
Route::get('/comments-section', [CorporationController::class, 'comments_section'])->name('comments_section.index');
Route::get('/presentation-for-readers', [CorporationController::class, 'presentation_for_readers'])->name('presentation_for_readers.index');
