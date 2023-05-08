<div class="search-two">
    <div class="search-header">
        <form action="{{ route('web.search-diseases', ['sectionSlug' => request()->sectionSlug]) }}" method="GET">
            <input type="text" placeholder="{{ __('Find a disease') }} .. " name="searchTerm" class="form-control">
            <button><img src="{{ url('web') }}/images/search.png" alt=""></button>
        </form>
    </div>

    <p>
        {{ __('The largest encyclopedia of diseases in the Arabic language! Discover the comprehensive encyclopedia of diseases from A to Z. Definition of diseases, their symptoms, diagnosis and methods of treatment, in Web Medicine. The only disease guide for trusted medical information. Here you can search for a disease in both Arabic and English, or search by common diseases, or by category. Enter the name of the disease in the search field') }}
    </p>
</div>

<div class="search-character mr-section">

    <div class="title-start">
        <h2>البحث بالحروف الأبجدية</h2><span></span>
    </div>

    <form action="">
        <div class="title-search-character">
            <h2> العربية</h2>
        </div>
        <ul>
            <li>
                <input type="radio" id="check_search" value="أ " name="search-character">
                <label for="check_search"> أ </label>
            </li>
            <li>
                <input type="radio" id="check_search1"value="ب " name="search-character">
                <label for="check_search1"> ب </label>
            </li>
            <li>
                <input type="radio" id="check_search2" value="ت " name="search-character">
                <label for="check_search2"> ت </label>
            </li>
            <li>
                <input type="radio" id="check_search3"value="ث " name="search-character">
                <label for="check_search3"> ث </label>
            </li>
            <li>
                <input type="radio" id="check_search4" value="ج" name="search-character">
                <label for="check_search4"> ج </label>
            </li>
            <li>
                <input type="radio" id="check_search5" value="ح" name="search-character">
                <label for="check_search5"> ح </label>
            </li>
            <li>
                <input type="radio" id="check_search6" value="خ" name="search-character">
                <label for="check_search6"> خ </label>
            </li>
            <li>
                <input type="radio" id="check_search7" value="د" name="search-character">
                <label for="check_search7">د </label>
            </li>
            <li>
                <input type="radio" id="check_search8" value="ذ" name="search-character">
                <label for="check_search8">ذ </label>
            </li>
            <li>
                <input type="radio" id="check_search9" value=" ر" name="search-character">
                <label for="check_search9"> ر </label>
            </li>
            <li>
                <input type="radio" id="check_search10" value=" ز" name="search-character">
                <label for="check_search10"> ز </label>
            </li>
            <li>
                <input type="radio" id="check_search11" value=" س" name="search-character">
                <label for="check_search11"> س </label>
            </li>
            <li>
                <input type="radio" id="check_search12" value="ش" name="search-character">
                <label for="check_search12"> ش</label>
            </li>
            <li>
                <input type="radio" id="check_search13" value="ص" name="search-character">
                <label for="check_search13"> ص</label>
            </li>
            <li>
                <input type="radio" id="check_search14" value=" ض " name="search-character">
                <label for="check_search14"> ض </label>
            </li>

            <li>
                <input type="radio" id="check_search16" value=" ف" name="search-character">
                <label for="check_search16"> ف</label>
            </li>
            <li>
                <input type="radio" id="check_search17" value=" ق " name="search-character">
                <label for="check_search17"> ق </label>
            </li>
            <li>
                <input type="radio" id="check_search17" value=" ع " name="search-character">
                <label for="check_search17">ع</label>
            </li>

            <li>
                <input type="radio" id="check_search18" value="غ  " name="search-character">
                <label for="check_search18"> غ </label>
            </li>
            <li>
                <input type="radio" id="check_search27" value=" ط " name="search-character">
                <label for="check_search27"> ط </label>
            </li>
            <li>
                <input type="radio" id="check_search27" value=" ظ " name="search-character">
                <label for="check_search27"> ظ </label>
            </li>
            <li>
                <input type="radio" id="check_search19" value=" ك " name="search-character">
                <label for="check_search19"> ك </label>
            </li>
            <li>
                <input type="radio" id="check_search20" value=" ل " name="search-character">
                <label for="check_search20"> ل </label>
            </li>
            <li>
                <input type="radio" id="check_search21" value=" م" name="search-character">
                <label for="check_search21"> م </label>
            </li>
            <li>
                <input type="radio" id="check_search122" value=" ن " name="search-character">
                <label for="check_search122"> ن </label>
            </li>
            <li>
                <input type="radio" id="check_search23" value=" ه" name="search-character">
                <label for="check_search23"> ه </label>
            </li>
            <li>
                <input type="radio" id="check_search24" value="و" name="search-character">
                <label for="check_search24"> و </label>
            </li>
            <li>
                <input type="radio" id="check_search25" value="ي" name="search-character">
                <label for="check_search25"> ي </label>
            </li>


        </ul>
        <div class="title-search-character">
            <h2> English </h2>
        </div>
        <ul class="character-en">
            <li>
                <input type="radio" id="check_search0" name="search-character">
                <label for="check_search0"> A </label>
            </li>
            <li>
                <input type="radio" id="check_search01" name="search-character">
                <label for="check_search01"> B </label>
            </li>
            <li>
                <input type="radio" id="check_search02" name="search-character">
                <label for="check_search02"> C </label>
            </li>
            <li>
                <input type="radio" id="check_search03" name="search-character">
                <label for="check_search03"> D </label>
            </li>
            <li>
                <input type="radio" id="check_search04" name="search-character">
                <label for="check_search04"> E </label>
            </li>
            <li>
                <input type="radio" id="check_search0122" name="search-character">
                <label for="check_search0122">F </label>
            </li>
            <li>
                <input type="radio" id="check_search05" name="search-character">
                <label for="check_search05"> G </label>
            </li>
            <li>
                <input type="radio" id="check_search06" name="search-character">
                <label for="check_search06"> H </label>
            </li>
            <li>
                <input type="radio" id="check_search07" name="search-character">
                <label for="check_search07"> I </label>
            </li>
            <li>
                <input type="radio" id="check_search08" name="search-character">
                <label for="check_search08"> J </label>
            </li>
            <li>
                <input type="radio" id="check_search023" name="search-character">
                <label for="check_search023"> K </label>
            </li>
            <li>
                <input type="radio" id="check_search09" name="search-character">
                <label for="check_search09"> L </label>
            </li>
            <li>
                <input type="radio" id="check_search010" name="search-character">
                <label for="check_search010"> M </label>
            </li>
            <li>
                <input type="radio" id="check_search011" name="search-character">
                <label for="check_search011"> N </label>
            </li>
            <li>
                <input type="radio" id="check_search012" name="search-character">
                <label for="check_search012"> O </label>
            </li>
            <li>
                <input type="radio" id="check_search013" name="search-character">
                <label for="check_search013"> P</label>
            </li>
            <li>
                <input type="radio" id="check_search014" name="search-character">
                <label for="check_search014"> Q </label>
            </li>

            <li>
                <input type="radio" id="check_search016" name="search-character">
                <label for="check_search016"> R </label>
            </li>
            <li>
                <input type="radio" id="check_search017" name="search-character">
                <label for="check_search017"> S </label>
            </li>
            <li>
                <input type="radio" id="check_search017" name="search-character">
                <label for="check_search017">T </label>
            </li>

            <li>
                <input type="radio" id="check_search018" name="search-character">
                <label for="check_search018"> U </label>
            </li>
            <li>
                <input type="radio" id="check_search027" name="search-character">
                <label for="check_search027"> V </label>
            </li>
            <li>
                <input type="radio" id="check_search027" name="search-character">
                <label for="check_search027"> W </label>
            </li>
            <li>
                <input type="radio" id="check_search019" name="search-character">
                <label for="check_search019"> X </label>
            </li>
            <li>
                <input type="radio" id="check_search020" name="search-character">
                <label for="check_search020"> Y </label>
            </li>
            <li>
                <input type="radio" id="check_search021" name="search-character">
                <label for="check_search021"> Z </label>
            </li>





        </ul>

    </form>
</div>
