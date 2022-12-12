<template>
    <!--Nav-->
    <a name="inicio"></a>
    <nav id="header" class="fixed w-full z-30 top-0 text-white">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
            <div class="pl-4 flex items-center">
                <img class="w-10" src="logo.png" />
                <span class="text-white text-2xl lg:text-3xl">PREMIOS<br>
                    FARALLONES</span>
            </div>
            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-white p-4 pt-8 lg:p-0 z-20" id="nav-content">
                <ul class="list-reset lg:flex justify-end flex-1 items-center">
                    <li class="mr-3">
                        <a class="inline-block py-2 px-4 font-bold no-underline" href="#inicio">Inicio</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="#info">Info</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="#historia">Historia</a>
                    </li>
                    <li class="mr-3">
                        <a class="inline-block no-underline hover:text-gray-800 hover:text-underline py-2 px-4" href="#galeria">Galería</a>
                    </li>
                </ul>
                <button
                    @click="openModal('registrar')"
                    id="navAction"
                    class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out"
                >
                    Nominate
                </button>
            </div>
        </div>
        <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>
    <!--Hero-->
    <div class="pt-24">
        <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
            <!--Left Col-->
            <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
                <h1 class="my-4 text-4xl lg:text-5xl font-bold leading-tight">
                    Premios Farallones 2022
                </h1>
                <button @click="openModal('registrar')" class="mx-auto lg:mx-0 hover:underline bg-white text-gray-800 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    Nominate aquí
                </button>
                <p class="leading-normal text-2xl mb-8">
                    Este 30 de diciembre de 2022 se realizará la ceremonia de los “Premios Farallones 2022"<br>
                    <a class="pl-2 text-sm text-blue-400 underline" href="Decreto0913_2022_Premios_Farallones.pdf" target="_blank">Consulta aquí el decreto correspondiente.</a>
                </p>
            </div>
            <!--Right Col-->
            <div class="w-full md:w-3/5 py-6 text-center">
                <img class="w-full z-50" src="banner_twitter3.png" />
            </div>
        </div>
    </div>
    <div class="-mt-12 lg:-mt-24">
        <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
                    <path
                        d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                        opacity="0.100000001"
                    ></path>
                    <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
                </g>
                <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <path
                        d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"
                    ></path>
                </g>
            </g>
        </svg>
    </div>
    <section class="bg-white text-gray-800 border-b py-4">
        <div class="container max-w-5xl mx-auto m-8">
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <div class="flex flex-wrap">
                <div class="w-full p-6">
                    <p class="text-justify">
                        Ceremonia en donde se hará el reconocimiento a los deportistas, entrenadores, dirigentes, árbitros y periodistas del mundo deportivo del alto rendimiento y social comunitario, destacando su dedicación y rendimiento en eventos locales, regionales, nacionales e internacionales en el año inmediatamente anterior
                    </p>
                </div>
            </div>

        </div>
    </section>
    <a name="info"></a>
    <section class="bg-white border-b py-4">
        <div class="container max-w-5xl mx-auto m-8">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                Premios Farallones 2022
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <div class="flex flex-wrap">
                <div class="w-full sm:w-1/2 p-6">
                    <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                        Premios Farallones de Santiago de Cali
                    </h3>
                    <p class="text-gray-600 mb-8 text-justify">
                        Los Premios Farallones de Santiago de Cali se definen por la Secretaría del Deporte y la Recreación como la ceremonia donde se nomina, exalta y otorga incentivos a destacados deportistas y reconocidas personalidades en el ejercicio de actividades deportivas de alto rendimiento y deporte social comunitario del Municipio de Santiago de Cali.
                        <br />
                    </p>
                </div>
                <div class="w-full sm:w-1/2 p-6">
                    <img class="w-full sm:h-64 mx-auto" src="images/30122020-DSC_1214.jpg" />
                </div>
            </div>
            <div class="flex flex-wrap flex-col-reverse sm:flex-row">
                <div class="w-full sm:w-1/2 p-6 mt-6">
                    <img class="w-5/6 sm:h-64 mx-auto" src="images/30122020-DSC_1277.jpg" />
                </div>
                <div class="w-full sm:w-1/2 p-6 mt-6">
                    <div class="align-middle">
                        <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                            La Misión de Nuestros Premios Farallones
                        </h3>
                        <p class="text-gray-600 mb-4 text-justify">
                            Se establece que la Secretaría del Deporte y la Recreación tiene como misión fomentar el espíritu deportivo y recreativo en el Municipio de Santiago de Cali y otorgó facultades y funciones al Secretario del Deporte y la Recreación para preparar los proyectos de decretos y resoluciones relacionados que deban dictarse en ejercicio de las atribuciones constitucionales y legales que corresponden al Alcalde, así como de definir las políticas para el fomento, estímulo y bienestar de los deportistas del Municipio de Santiago de Cali.
                            <br />
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <a name="historia"></a>
    <section name="historia" class="bg-white border-b py-8">
        <div class="container mx-auto flex flex-wrap pt-4 pb-12">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                Historia
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                    <div class="flex flex-wrap no-underline hover:no-underline">
                        <p class="text-gray-800 text-base px-6 mb-5 text-justify">
                            En 1971, se disputaron los Juegos Panamericanos en Santiago de Cali, dándole el título a la ciudad como ‘Cali Ciudad Deportiva’, donde se han disputado eventos de gran importancia cómo: el campeonato mundial de natación en 1975, el campeonato masculino mundial de baloncesto 1982, los juegos mundiales 2013. Desde entonces, y debido a estos eventos deportivos se crearon ‘Los Premios Farallones’
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                    <div class="flex flex-wrap no-underline hover:no-underline">
                        <p class="text-gray-800 text-base px-6 mb-5 text-justify">
                            Nuestros Premios Farallones se crearon por y para nuestros deportistas, y todos los que están involucrados en el movimiento deportivo de la ciudad, estableciéndose como un evento donde se elogia y otorgan estímulos a todas estas personas que se merecen un reconocimiento por su esfuerzo, disciplina y dedicación en los eventos deportivos locales, regionales, nacionales e internacionales.
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                    <a href="#" class="flex flex-wrap no-underline hover:no-underline">
                        <p class="text-gray-800 text-base px-6 mb-5 text-justify">
                            Cali ha albergado distintas competencias deportivas de gran importancia, que han posicionado a Cali como una ciudad deportiva, no solamente logrando la distinción nacional sino también destacándose a nivel internacional.
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <a name="galeria"></a>
    <section name="galeria" class="bg-gray-100 py-8">
        <div class="container mx-auto px-2 pt-4 pb-12 text-gray-800">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                Galería
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>


            <vueper-slides
                :touchable="false"
                fade
                class="no-shadow"
                :autoplay="true"
                :bullets="true"
                :visible-slides="3"
                slide-multiple
                :gap="3"
                :dragging-distance="200"
                arrows="false"
                arrowsOutside="false"
                disableArrowsOnEdges="true"
                slideContentOutside="false"
                slideImageInside="true"
                :breakpoints="{ 800: { visibleSlides: 2, slideMultiple: 2 } }"
                >
                <template #arrow-right>
                    <i class="icon icon-arrow-right" />
                </template>
                <vueper-slide
                    v-for="(slide, i) in slides"
                    :key="i"
                    :image="slide.image">
                </vueper-slide>
            </vueper-slides>

        </div>
    </section>
    <!-- Change the colour #f8fafc to match the previous section colour -->
    <svg class="wave-top" viewBox="0 0 1439 147" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <g transform="translate(-1.000000, -14.000000)" fill-rule="nonzero">
                <g class="wave" fill="#f8fafc">
                    <path
                        d="M1440,84 C1383.555,64.3 1342.555,51.3 1317,45 C1259.5,30.824 1206.707,25.526 1169,22 C1129.711,18.326 1044.426,18.475 980,22 C954.25,23.409 922.25,26.742 884,32 C845.122,37.787 818.455,42.121 804,45 C776.833,50.41 728.136,61.77 713,65 C660.023,76.309 621.544,87.729 584,94 C517.525,105.104 484.525,106.438 429,108 C379.49,106.484 342.823,104.484 319,102 C278.571,97.783 231.737,88.736 205,84 C154.629,75.076 86.296,57.743 0,32 L0,0 L1440,0 L1440,84 Z"
                    ></path>
                </g>
                <g transform="translate(1.000000, 15.000000)" fill="#FFFFFF">
                    <g transform="translate(719.500000, 68.500000) rotate(-180.000000) translate(-719.500000, -68.500000) ">
                        <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
                        <path
                            d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
                            opacity="0.100000001"
                        ></path>
                        <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" opacity="0.200000003"></path>
                    </g>
                </g>
            </g>
        </g>
    </svg>
    <section class="container mx-auto text-center ">


    <!--Footer-->
    <footer >
        <div class="container mx-auto px-8">
            <div class="w-full flex items-center pb-4">
                    <div class="w-1/2 lg:w-1/3">
                        <div class="flex text-white no-underline text-xl lg:text-3xl">
                            <img class="w-10 lg:w-16" src="logo.png" />
                            <span class="items-start">PREMIOS<br>
                            FARALLONES</span>
                        </div>
                    </div>
                    <div class="hidden lg:flex w-1/3">
                        <img class="h-10 lg:h-20" src="calideportiva03.png" />
                    </div>
                    <div class="w-1/2 lg:w-1/3">
                        <img class="h-20 lg:h-32 float-right " src="purocorazon.png" />
                    </div>

            </div>
        </div>
    </footer>

    <!-- Ventana modal Registro -->
    <section> <!-- Ventana modal -->
        <div class="fixed z-10 inset-0 overflow-y-auto text-md ease-out duration-400" v-if="isOpen">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

                <div class="fixed inset-0 transition-opacity">
                    <div @click="closeModal()" class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
                <div class="inline-block md:w-8/12 align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                    <!-- Menu Tabs -->
                    <section>
                        <div class="border-b border-gray-200">
                            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500">
                                <li class="mr-2">
                                    <div class="flex">
                                        <h2 class="text-xl font-bold text-gray-900 px-4 pt-2 pb-2">Formulario de registro de nominaciones</h2>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>
                    <!-- Fin Menu Tabs -->

                    <form-wizard next-button-text="Siguiente" subtitle="Formulario de registro" color="#1a2d4d"
                                 back-button-text="Volver" step-size="xs" finishButtonText="Terminar"
                                 validateOnBack="false"
                                 @on-change="onChange"
                                 @on-validate="handleValidation"
                                 @on-error="onError"
                    >
                        <tab-content title="Datos personales" icon="ti-ticket" :before-change="validateDatospersonales">
                            <!-- Seccion menu 1 -->
                            <section>
                                <button type="button" @click="closeModal()" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                                <div class="mt-2 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                    <div class="">
                                        <h4 class="text-xl font-bold text-gray-900 px-4 pt-2 pb-2">Datos personales</h4>
                                        <p class="text-sm text-red-500 px-4">Ingrese toda información solicitada.</p>
                                    </div>
                                </div>
                                <div class="mt-2 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                    <div>
                                        <label class="block text-md font-medium text-gray-700">Tipo documento</label>
                                        <div class="mt-1">
                                            <select class="block text-black w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" v-model="form.idtipos_documento">
                                                <option value="-" >Seleccione</option>
                                                <option v-for="tipodoc in arrayTiposdocumento" :key="tipodoc.id" :value="tipodoc.id" v-text="tipodoc.nombre_corto"></option>
                                            </select>
                                            <div v-if="errors.idtipos_documento" class="text-xs text-red-500">{{ errors.idtipos_documento }}</div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-md font-medium text-gray-700">Documento</label>
                                        <div class="mt-1">
                                            <input @change="buscarDocumento(form.documento)" type="number" min="1" max="20" :verMode="editMode" :class="{'bg-blue-100' : verMode}" v-model="form.documento" autocomplete="postal-code" class="text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <div v-if="errors.documento" class="text-xs text-red-500">{{ errors.documento }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                    <div>
                                        <label class="block text-md font-medium text-gray-700">Nombres</label>
                                        <div class="mt-1">
                                            <input type="text" :disabled="verMode" :class="{'bg-blue-100' : verMode}" v-model="form.nombres" autocomplete="given-name" class="text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <div v-if="errors.nombres" class="text-xs text-red-500">{{ errors.nombres }}</div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-md font-medium text-gray-700">Apellidos</label>
                                        <div class="mt-1">
                                            <input type="text" :disabled="verMode" :class="{'bg-blue-100' : verMode}" v-model="form.apellidos" autocomplete="family-name" class="text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <div v-if="errors.apellidos" class="text-xs text-red-500">{{ errors.apellidos }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                    <div>
                                        <label class="block text-md font-medium text-gray-700">Departamento de nacimiento</label>
                                        <div class="mt-1">
                                            <select :disabled="verMode" :class="{'bg-blue-100' : verMode}" class="text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" v-model="form.iddepartamento" @change="getCiudades(form.iddepartamento)">
                                                <option value="-" >Seleccione departamento</option>
                                                <option v-for="departamento in arrayDepartamentos" :key="departamento.id" :value="departamento.id" v-text="departamento.nombre"></option>
                                            </select>
                                            <div v-if="errors.iddepartamento" class="text-xs text-red-500">{{ errors.iddepartamento }}</div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-md font-medium text-gray-700">Ciudad de nacimiento</label>
                                        <div class="mt-1">
                                            <select :disabled="verMode" :class="{'bg-blue-100' : verMode}" class="text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" v-model="form.idciudad">
                                                <option value="-" >Seleccione Ciudad</option>
                                                <option v-for="ciudad in arrayCiudades" :key="ciudad.id" :value="ciudad.id" v-text="ciudad.nombre"></option>
                                            </select>
                                            <div v-if="errors.idciudad" class="text-xs text-red-500">{{ errors.idciudad }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                    <div>
                                        <label class="block text-md font-medium text-gray-700">Fecha de nacimiento</label>
                                        <div class="mt-1">
                                            <Datepicker v-model="form.fechanacimiento" textInput :enableTimePicker="false" :disabled="verMode" autoApply placeholder="Fecha nacimiento" class="border border-gray-300 rounded w-full text-gray-700 focus:outline-none focus:shadow-outline"/>
                                            <div v-if="errors.fechanacimiento" class="text-xs text-red-500">{{ errors.fechanacimiento }}</div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-md font-medium text-gray-700">Género</label>
                                        <div class="mt-1">
                                            <select :disabled="verMode" :class="{'bg-blue-100' : verMode}" class="text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" v-model="form.idgenero">
                                                <option value="-" >Seleccione</option>
                                                <option v-for="dato in arrayGeneros" :key="dato.id" :value="dato.id" v-text="dato.nombre"></option>
                                            </select>
                                            <div v-if="errors.idgenero" class="text-xs text-red-500">{{ errors.idgenero }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                    <div>
                                        <label class="block text-md font-medium text-gray-700">Número de años viviendo en Cali</label>
                                        <div class="mt-1">
                                            <input type="number" :disabled="verMode" :class="{'bg-blue-100' : verMode}" v-model="form.viviendocali" autocomplete="family-name" class="text-black block w-full text-black border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <div v-if="errors.viviendocali" class="text-xs text-red-500">{{ errors.viviendocali }}</div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- fin menu 1 -->
                        </tab-content>
                        <tab-content title="Nominaciones" icon="ti-user" :before-change="validateCheckout">
                            <!-- Seccion menu 1 -->
                            <section>
                                <!-- Ventana modal Aval -->
                                <!-- Main modal -->
                                <button type="button" @click="closeModal()" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                                <div class="mt-2 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                    <div class="">
                                        <h4 class="text-xl font-bold text-gray-900 px-4 pt-2 pb-2">Seleccione el año</h4>
                                        <p class="text-sm text-red-500 px-4">Ingrese toda información solicitada.</p>
                                    </div>
                                </div>

                                <div class="mt-2 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                    <div class="text-center">
                                        <button @click="selctPeriodo('2021')" :class="{'border-blue-500 border-4 ring-4 outline-none ring-blue-300 bg-blue-800': nominaciones.anio == '2021'}" type="button" class="text-white bg-blue-400 hover:bg-blue-800 font-medium rounded-lg text-md px-5 py-2.5 text-center inline-flex items-center">
                                            Año 2021
                                            <svg aria-hidden="true" class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        </button>
                                    </div>
                                    <div class="text-center">
                                        <button @click="selctPeriodo('2022')" :class="{'border-blue-500 border-4 ring-4 outline-none ring-blue-300 bg-blue-800': nominaciones.anio == '2022'}" type="button" class="text-white bg-blue-400 hover:bg-blue-800 font-medium rounded-lg text-md px-5 py-2.5 text-center inline-flex items-center">
                                            Año 2022
                                            <svg aria-hidden="true" class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                        </button>
                                    </div>
                                </div>
                                <div v-show="estado == 'selctPeriodo'" class="mt-2 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                    <div class="flex">
                                        <h4 class="text-xl font-bold text-gray-900 px-4 pt-2 pb-2">Seleccione la categoría</h4>
                                    </div>
                                </div>
                                <div v-show="estado == 'selctPeriodo'" class="mt-2 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                    <div>
                                        <label class="block text-md font-medium text-gray-700">Modalidad</label>
                                        <select @change="getCategorias(nominaciones.idmodalidad)" class="text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" v-model="nominaciones.idmodalidad">
                                            <option value="0" >Seleccione</option>
                                            <option v-for="dato in arrayModalidades" :key="dato.id" :value="dato.id" v-text="dato.nombre"></option>
                                        </select>
                                        <div v-if="errors.idmodalidad" class="text-xs text-red-500">{{ errors.idmodalidad }}</div>
                                    </div>
                                    <div>
                                        <label class="block text-md font-medium text-gray-700">Categoría</label>
                                        <select class="text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" v-model="nominaciones.idcategoria">
                                            <option value="0" >Seleccione</option>
                                            <option v-for="dato in arrayCategorias" :key="dato.id" :value="dato.id" v-text="dato.nombre"></option>
                                        </select>
                                        <div v-if="errors.idcategoria" class="text-xs text-red-500">{{ errors.idcategoria }}</div>
                                    </div>
                                </div>
                                <div v-show="estado == 'selctPeriodo'" class="mt-2 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                    <div>
                                        <label class="block text-md font-medium text-gray-700">Nombre competición</label>
                                        <div class="mt-1">
                                            <input type="text" :disabled="verMode" :class="{'border-blue-500 border-4' : estado == 1}" v-model="nominaciones.nombre" autocomplete="given-name" class="text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <div v-if="errors.nombrecompeticion" class="text-red-500">{{ errors.nombrecompeticion }}</div>
                                        </div>
                                    </div>
                                    <div>
                                        <label :class="{'font-bold' : estado == 4}" class="block mt-2 text-md font-medium text-gray-700">Certificado</label>
                                        <div class="my-auto">
                                            <form name="cc" id="cc" @submit.prevent="submit" enctype="multipart/form-data">
                                                <div>
                                                    <input @change="onFileChange" accept=".pdf" type="file" name="file" id="file" class="border-2 h-9 text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-black-500 sm:text-sm">
                                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">El archivo debe estar en formato PDF.</p>
                                                    <div v-if="errors.file" class="text-red-500">{{ errors.file }}</div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div v-show="nominaciones.nombre && nominaciones.file" class="mt-2 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                    <div class="flex">
                                        <h4 class="text-xl font-bold text-gray-900 px-4 pt-2 pb-2">Ingrese la cantidad de medallas</h4>
                                    </div>
                                </div>
                                <div v-show="nominaciones.nombre && nominaciones.file" class="mt-2 grid grid-cols-1 gap-y-6 sm:grid-cols-3 sm:gap-x-4">
                                    <div>
                                        <div class="mt-1 flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-yellow-500 w-10 h-10">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0" />
                                            </svg>
                                            <div class="text-center mx-auto">
                                                <input type="number" min="0" max="100" v-model="nominaciones.oro" autocomplete="given-name" class="text-bold text-center text-black block w-2/3 border-blue-800 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-xl">
                                                <div v-if="errors.oro" class="text-red-500">{{ errors.oro }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="mt-1 flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-gray-500 w-10 h-10">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0" />
                                            </svg>
                                            <div class="text-center mx-auto">
                                                <input type="number" min="0" max="100" v-model="nominaciones.plata" autocomplete="given-name" class="text-bold text-center text-black block w-2/3 border-blue-800 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-xl">
                                                <div v-if="errors.plata" class="text-red-500">{{ errors.plata }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="mt-1 flex">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-amber-700 w-10 h-10">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 013 3h-15a3 3 0 013-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 01-.982-3.172M9.497 14.25a7.454 7.454 0 00.981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 007.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 002.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 012.916.52 6.003 6.003 0 01-5.395 4.972m0 0a6.726 6.726 0 01-2.749 1.35m0 0a6.772 6.772 0 01-3.044 0" />
                                            </svg>
                                            <div class="text-center mx-auto">
                                                <input type="number" min="0" max="100" v-model="nominaciones.bronce" autocomplete="given-name" class="text-bold text-center text-black block w-2/3 border-blue-800 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-xl">
                                                <div v-if="errors.bronce" class="text-red-500">{{ errors.bronce }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div v-if="form.nominaciones.length > 0" class="mt-2 grid grid-cols-1 gap-y-6 sm:grid-cols-1 sm:gap-x-4">
                                    <!-- Tabla de contenido -->
                                    <section>
                                        <div class="mt-2 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                            <div class="flex">
                                                <h4 class="text-xl font-bold text-gray-900 px-4 pt-2 pb-2">Listado de nominaciones</h4>
                                            </div>
                                        </div>
                                        <div class="lg:px-4 md:px-2 sm:px-0 py-2 overflow-y-auto h-50">
                                            <table class="border-black text-black table-fixed w-full">
                                                <thead>
                                                <tr class="bg-gray-100">
                                                    <th class="text-center px-4 py-2 w-1/12 text-sm font-bold rounded-b">
                                                        Año
                                                    </th>
                                                    <th class="text-center px-4 py-2 w-2/12 text-sm font-bold rounded-b">
                                                        Modalidad
                                                    </th>
                                                    <th class="text-center px-4 py-2 w-3/12 text-sm font-bold rounded-b">
                                                        Categoría
                                                    </th>
                                                    <th class="text-center px-4 py-2 text-sm font-bold w-3/12 rounded-b">
                                                        Nombre
                                                    </th>
                                                    <th class="hidden md:table-cell text-center px-4 py-2 text-sm font-bold w-1/12 rounded-b">
                                                        Oro
                                                    </th>
                                                    <th class="hidden md:table-cell text-center px-4 py-2 text-sm font-bold w-1/12 rounded-b">
                                                        Plata
                                                    </th>
                                                    <th class="hidden md:table-cell text-center px-4 py-2 text-sm font-bold w-1/12 rounded-b">
                                                        Bronce
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="text-black text-center" @click="rowSelect(dato.id)" text-sm v-if="form.nominaciones" v-for="(dato, id) in form.nominaciones" :key="dato.id">
                                                    <td class="border px-1 py-2 text-sm truncate" v-text="dato.anio"></td>
                                                    <td class="border px-1 py-2 text-sm truncate" v-text="dato.modalidad.nombre"></td>
                                                    <td class="border px-1 py-2 text-sm truncate" v-text="dato.categoria.nombre"></td>
                                                    <td class="border px-1 py-2 text-sm truncate" v-text="dato.nombre"></td>
                                                    <td class="hidden md:table-cell border px-1 py-2 text-sm truncate" v-text="dato.oro"></td>
                                                    <td class="hidden md:table-cell border px-1 py-2 text-sm truncate" v-text="dato.plata"></td>
                                                    <td class="hidden md:table-cell border px-1 py-2 text-sm truncate" v-text="dato.bronce"></td>
                                                </tr>
                                                <tr v-else>
                                                    <td class="text-black border px-4 py-2 text-xs text-center" colspan="7"> La consulta no obtuvo datos</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <section class="mt-6">
                                                <div v-if="arrayData.links.length > 3">
                                                    <div class="flex flex-wrap -mb-1">
                                                        <template v-for="(link, p) in arrayData.links" :key="p">
                                                            <div v-if="link.url === null" class="mr-1 mb-1 px-4 py-3 text-sm leading-4 text-gray-400 border rounded"
                                                                 v-html="link.label" />
                                                            <button  v-else
                                                                     class="mr-1 mb-1 px-4 py-3 text-sm leading-4 border rounded hover:bg-white focus:border-indigo-500 focus:text-indigo-500"
                                                                     :class="{ 'bg-blue-700 text-white': link.active }"
                                                                     v-on:click="cambiarPage(link.url)"
                                                                     v-html="link.label" />
                                                        </template>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </section>
                                    <!-- Fin Tabla de contenido -->
                                </div>
                                <!-- Fin Ventana modal Aval -->
                            </section>
                            <!-- fin menu 1 -->
                        </tab-content>
                        <tab-content title="Contacto" icon="ti-basketball" :before-change="validateContacto">

                            <!-- Seccion menu 1 -->
                            <section>
                                <button type="button" @click="closeModal()" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </button>
                                <div class="mt-2 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                    <div class="">
                                        <h4 class="text-xl font-bold text-gray-900 px-4 pt-2 pb-2">Datos de Contacto</h4>
                                        <p class="text-sm text-red-500 px-4">Ingrese toda información solicitada.</p>
                                    </div>
                                </div>
                                <div class="mt-2 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                    <div>
                                        <label class="block text-md font-medium text-gray-700">Celular</label>
                                        <div class="mt-1">
                                            <input type="number" min="1" max="20" :verMode="editMode" :class="{'bg-blue-100' : verMode}" v-model="form.celular" autocomplete="postal-code" class="text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <div v-if="errors.celular" class="text-red-500">{{ errors.celular }}</div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-md font-medium text-gray-700">Teléfono</label>
                                        <div class="mt-1">
                                            <input type="number" min="1" max="20" :verMode="editMode" :class="{'bg-blue-100' : verMode}" v-model="form.telefono" autocomplete="postal-code" class="text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <div v-if="errors.telefono" class="text-red-500">{{ errors.telefono }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                    <div>
                                        <label class="block text-md font-medium text-gray-700">Corre electrónico</label>
                                        <div class="mt-1">
                                            <input type="email" :verMode="editMode" :class="{'bg-blue-100' : verMode}" v-model="form.correo" autocomplete="postal-code" class="text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <div v-if="errors.correo" class="text-red-500">{{ errors.correo }}</div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-md font-medium text-gray-700">Dirección</label>
                                        <div class="mt-1">
                                            <input type="text" :verMode="editMode" :class="{'bg-blue-100' : verMode}" v-model="form.direccion" autocomplete="postal-code" class="text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <div v-if="errors.direccion" class="text-red-500">{{ errors.direccion }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                    <div>
                                        <label class="block text-md font-medium text-gray-700">Barrio</label>
                                        <div class="mt-1">
                                            <input type="text" :verMode="editMode" :class="{'bg-blue-100' : verMode}" v-model="form.barrio" autocomplete="postal-code" class="text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <div v-if="errors.barrio" class="text-red-500">{{ errors.barrio }}</div>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-md font-medium text-gray-700">Comuna</label>
                                        <div class="mt-1">
                                            <input type="number" :verMode="editMode" :class="{'bg-blue-100' : verMode}" v-model="form.comuna" autocomplete="postal-code" class="text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                            <div v-if="errors.comuna" class="text-red-500">{{ errors.comuna }}</div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div v-show="form.acudiente">
                                    <div class="mt-2 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                        <div class="flex">
                                            <h4 class="text-xl font-bold text-gray-900 px-4 pt-2 pb-2">Datos del acudiente</h4>
                                        </div>
                                    </div>
                                    <div class="mt-2 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                        <div>
                                            <label class="text-black block text-md font-medium text-gray-700">Nombre</label>
                                            <div class="mt-1">
                                                <input type="text" :verMode="editMode" :class="{'bg-blue-100' : verMode}" v-model="form.anombre" autocomplete="postal-code" class="text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <div v-if="errors.anombre" class="text-red-500">{{ errors.anombre }}</div>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-md font-medium text-gray-700">Parentesco</label>
                                            <div class="mt-1">
                                                <input type="text" :verMode="editMode" :class="{'bg-blue-100' : verMode}" v-model="form.aparentesco" autocomplete="postal-code" class="text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <div v-if="errors.aparentesco" class="text-red-500">{{ errors.aparentesco }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                        <div>
                                            <label class="block text-md font-medium text-gray-700">Tipo documento</label>
                                            <div class="mt-1">
                                                <select class="text-black block text-black w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" v-model="form.aidtipos_documento">
                                                    <option value="-" >Seleccione</option>
                                                    <option v-for="tipodoc in arrayTiposdocumento" :key="tipodoc.id" :value="tipodoc.id" v-text="tipodoc.nombre_corto"></option>
                                                </select>
                                                <div v-if="errors.aidtipos_documento" class="text-red-500">{{ errors.aidtipos_documento }}</div>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-md font-medium text-gray-700">Documento</label>
                                            <div class="mt-1">
                                                <input type="number" min="1" max="20" :verMode="editMode" :class="{'bg-blue-100' : verMode}" v-model="form.adocumento" autocomplete="postal-code" class="text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <div v-if="errors.adocumento" class="text-red-500">{{ errors.adocumento }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                        <div>
                                            <label class="block text-md font-medium text-gray-700">Celular</label>
                                            <div class="mt-1">
                                                <input type="number" min="1" max="20" :verMode="editMode" :class="{'bg-blue-100' : verMode}" v-model="form.acelular" autocomplete="postal-code" class="text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <div v-if="errors.acelular" class="text-red-500">{{ errors.acelular }}</div>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="block text-md font-medium text-gray-700">Teléfono</label>
                                            <div class="mt-1">
                                                <input type="number" min="1" max="20" :verMode="editMode" :class="{'bg-blue-100' : verMode}" v-model="form.atelefono" autocomplete="postal-code" class="text-black block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <div v-if="errors.atelefono" class="text-red-500">{{ errors.atelefono }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- fin menu 1 -->
                        </tab-content>

                    </form-wizard>
                </div>
            </div>
        </div>
    </section>
    <!-- Fin Ventana modal Detalles -->


    <!-- Main modal -->
    <section> <!-- Ventana modal -->
        <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400" v-if="isOpendatos">
            <div class="items-end justify-center min-h-screen pt-24 px-4 pb-20 text-center sm:block sm:p-0">

                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>

                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
                <div class="inline-block lg:w-4/12 align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                    <button type="button" @click="isOpendatos = !isOpendatos" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                    <div class="">
                        <h2 class="text-xl font-bold text-gray-900 px-4 py-4">Política de tratamiento de datos</h2>
                    </div>
                    <div class="bg-white px-4 pt-2 pb-4 ">
                        <div class="">
                            <div class="mt-1">
                                <textarea rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">Por la presente autorizo al Municipio de Santiago de Cali – Secretaría del Deporte y la Recreación para que use, edite, publique, reproduzca, distribuya y/o licencie mi imagen, la de las niñas y niños y/o adultos que represento (hijos, personas con discapacidad o adultos mayores) de cuyos derechos de autor soy titular. Reconozco que esta autorización no supone pago ni retribución incluyendo regalías u otra compensación resultante de su uso. Tengo conocimiento de que esta imagen puede editarse, copiarse, exhibirse, publicarse o distribuirse, por varios medios incluyendo el electrónico, sin que tenga derecho a examinar o autorizar la reproducción del producto final en que ella aparezca. La presente autorización no tiene fecha de expiración ni se restringe a límite geográfico alguno en cuanto a la distribución y/o reproducción de esta imagen. Certifico también que tengo la potestad de conferir los derechos antes mencionados y que el ejercicio de éstos no infringe los derechos de propiedad intelectual o de imagen de terceros. Igualmente, autorizo la participación en investigaciones socio-estadísticas de la de las niñas y niños y/o adultos que represento adelantadas por parte del Municipio de Santiago de Cali, tales como encuestas, test, grupos focales, sondeos, entre otros. Además entiendo que la actividad derivada de la práctica de deporte, recreación y actividad física implica la posibilidad de sufrir lesiones y/o riesgos, según fui informado en detalle por parte del Municipio de Santiago de Cali – Secretaría del Deporte y la Recreación. Estoy de acuerdo con las recomendaciones, obligaciones y sugerencias que me han brindado en cuanto al cuidado de mi salud y las formas a seguir previas y durante la actividad y entiendo que no me eximo de la responsabilidad de atender tales recomendaciones y respetarlas para reducir todo riesgo al mínimo. Con la aceptación de esta Autorización y Consentimiento reconozco que he leído íntegramente y entendido plenamente lo anterior y consciente de las repercusiones legales acepto atenerme a ellos.
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                          <button @click="registrarCheckout()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5" >
                            Aceptar
                          </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fin Ventana modal -->

    <!-- jQuery if you need it
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  -->

    </section>
</template>

<script>
//import AppLayout from '@/Layouts/AppLayout.vue';
import Swal from "sweetalert2";
import { Icon } from '@iconify/vue';
import Toggle from '@vueform/toggle';
//import '@vueform/toggle/themes/default.css';
import Button from "../../Jetstream/Button";
import moment from 'moment'
import { QuillEditor } from '@vueup/vue-quill';
//import '@vueup/vue-quill/dist/vue-quill.snow.css';
import { ref, onMounted } from 'vue';
import { Money3Component } from 'v-money3'
import {Head, Link, usePage} from '@inertiajs/inertia-vue3';
import JetNavLink from '@/Jetstream/NavLink.vue';
import NavLink from "../../Jetstream/NavLink";
import Input from "../../Jetstream/Input";
import {FormWizard, TabContent} from 'vue3-form-wizard';
import 'vue3-form-wizard/dist/style.css';
import ThemifyIcon from "vue-themify-icons";

import { VueperSlides, VueperSlide } from 'vueperslides';
//import 'vueperslides/dist/vueperslides.css';

export default {

    components: {
        Input,
        NavLink,
        Button,
        //AppLayout,
        Icon,
        Toggle,
        QuillEditor,
        JetNavLink,
        Link,
        money3: Money3Component,
        FormWizard,
        ThemifyIcon,
        TabContent,
        VueperSlides,
        VueperSlide
    },
    props:{
        militantes : [],
        errors: Object,
        _token: null
    },
    computed: {

    },
    data() {
        return {
            slides: [
                { image: 'images/30122020-DSC_1238.jpg' },
                { image: 'images/30122020-DSC_1386.jpg' },
                { image: 'images/30122020-DSC_1381.jpg' },
                { image: 'images/30122020-DSC_1347.jpg' },
                { image: 'images/30122020-DSC_1280.jpg' },
                { image: 'images/30122020-DSC_1196.jpg' },
                { image: 'images/30122020-DSC_1205.jpg' },
                { image: 'images/30122020-DSC_1364.jpg' },
                { image: 'images/30122020-DSC_1325.jpg' },
                { image: 'images/30122020-DSC_1182.jpg' },
                { image: 'images/30122020-DSC_1176.jpg' },
                { image: 'images/30122020-DSC_1256.jpg' },
                { image: 'images/30122020-DSC_1191.jpg' },
                { image: 'images/30122020-DSC_1355.jpg' },
                { image: 'images/30122020-DSC_1277.jpg' },
                { image: 'images/30122020-DSC_1193.jpg' },
                { image: 'images/30122020-DSC_1334.jpg' },
                { image: 'images/30122020-DSC_1183.jpg' },
                { image: 'images/30122020-DSC_1190.jpg' },
                { image: 'images/30122020-DSC_1385.jpg' },
                { image: 'images/30122020-DSC_1197.jpg' },
                { image: 'images/30122020-DSC_1174.jpg' },
                { image: 'images/30122020-DSC_1202.jpg' },
                { image: 'images/30122020-DSC_1359.jpg' },
                { image: 'images/30122020-DSC_1301.jpg' },
                { image: 'images/30122020-DSC_1200.jpg' },
                { image: 'images/30122020-DSC_1214.jpg' },
                { image: 'images/30122020-DSC_1204.jpg' },
                { image: 'images/30122020-DSC_1396.jpg' },
                { image: 'images/30122020-DSC_1399.jpg' },
                { image: 'images/30122020-DSC_1188.jpg' },
                { image: 'images/30122020-DSC_1378.jpg' },
                { image: 'images/30122020-DSC_1230.jpg' },
                { image: 'images/30122020-DSC_1239.jpg' },
                { image: 'images/30122020-DSC_1179.jpg' },
                { image: 'images/30122020-DSC_1316.jpg' },
                { image: 'images/30122020-DSC_1351.jpg' },
                { image: 'images/30122020-DSC_1254.jpg' },
                { image: 'images/30122020-DSC_1343.jpg' },
                { image: 'images/30122020-DSC_1389.jpg' },
                { image: 'images/30122020-DSC_1352.jpg' },
                { image: 'images/30122020-DSC_1287.jpg' },
                { image: 'images/30122020-DSC_1338.jpg' },
                { image: 'images/30122020-DSC_1208.jpg' },
                { image: 'images/30122020-DSC_1363.jpg' },

            ],
            currentstate: '',
            protecciondatos: false,
            isOpendatos: false,
            progresoimport: '',
            current_row: 0,
            total_rows: 0,
            progress: 0,
            start_date: '',
            finish_date: '',
            isImportprogress: false,
            estado: 'inicio',

            session: [],
            loadingWizard: false,
            inputValue: null,

            verHistorialobs: null,
            activetab: '1',
            tituloModal: '',
            tituloModalDetalle: '',

            nominaciones: {
                idnominado: 0,
                nombre: '',
                anio: '',
                idmodalidad: 0,
                idcategoria: 0,
                certificado: null,
                oro: 0,
                plata: 0,
                bronce: 0,
                file: ''
            },
            form: {
                id: null,
                periodo: null,
                nombres	: '',
                apellidos	: '',
                correo	: '',
                estado	: 0,
                idtipos_documento	: 1,
                documento	: null,
                idpais	: 1,
                iddepartamento	: 0,
                idciudad	: 0,
                celular	: '',
                fechanacimiento	: null,
                idgenero	: 1,
                iddepartamenton	: null,
                idciudadn	: null,
                viviendocali	: 0,
                telefono	: '',
                direccion	: '',
                barrio	: '',
                comuna	: 0,
                anombre	: '',
                aparentesco	: '',
                adocumento	: '',
                acelular	: '',
                atelefono	: '',
                aidtipos_documento: 1,
                foto	: null,
                certificado	: null,
                nominaciones: [],
        /*
        {
                    nombre: '',
                    anio: '',
                    idmodalidad: 0,
                    idcategoria: 0,
                    certificado: null,
                    oro: 0,
                    plata: 0,
                    bronce: 0
                }

         */
            },
            formestado: {
                idmilitante: null,
                estado: null,
                tipo: null,
                observaciones: null
            },
            archivoform: {
                idmilitante: 0,
                file: '',
                idtipoarchivo: 0
            },

            errors: {
                documento: null
            }
        }
    },
    methods: {

        onFileChange(e){
            this.nominaciones.file = e.target.files[0];
            let archivo = document.getElementById('file').value,
                extension = archivo.substring(archivo.lastIndexOf('.'),archivo.length);
            if(document.getElementById('file').getAttribute('accept').split(',').indexOf(extension) < 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Archivo inválido. No se permite la extensión '  + extension,
                    showConfirmButton: true,
                })
                this.nominaciones.file = null;
            }
        },
        onFileChange2(e){
            this.archivoform.file = e.target.files[0];
            this.subirArchivocc(this.archivoform);
        },
        selctPeriodo: function (periodo) {
            this.form.periodo = periodo;
            this.estado = 'selctPeriodo';
            this.nominaciones.anio = periodo;
        },

        openModal: function (accion, data = []) {
            this.isOpen = true;
            this.reset();
            this.getDepartamentos();
            this.getTiposdocumento();
            switch (accion) {
                case 'registrar': {
                    this.form.fechaingreso = Date.now();
                    this.form.idpais = 1;
                    this.form.iddepartamento = '-';
                    this.form.idciudad = '-';
                    this.form.idtipos_documento = '-';
                    this.form.idgenero = '-';
                    this.form.idgrupoetnico = '-';
                    this.form.estado = 1;
                    this.newMode = true;
                    this.verMode = false;
                    this.editMode = false;
                    break;
                }
            }
        },
        closeModal: function () {
            this.isOpen = false;
            this.reset();
            this.editMode = false;
            this.verMode  = false;
            this.newMode  = false;
            this.errors = [];
        },

        subirArchivo: function (data) {
            if (data.idtipoarchivo > 0 && data.file) {
                this.$inertia.post('/archivo/upload', data, {
                    onSuccess: (page) => {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Archivo actualizado',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        this.actualizarArchivos(data.idmilitante);
                        //this.archivoform.idmilitante = 0;
                        this.archivoform.file = '';
                        this.archivoform.idtipoarchivo = 0;
                    },
                });
            } else {
                Swal.fire({
                    position: 'top-end',
                    icon: 'warning',
                    title: 'Seleccione un archivo',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        },
        subirArchivocc: function (data) {
            data.id = this.formcc.id;
            this.$inertia.post('/archivocc/upload', data, {
                onSuccess: (page) => {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Archivo actualizado',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    this.actualizarArchivos(data.idmilitante);
                },
            });
        },
        actualizarArchivos: function (data) {
            var url= '/getArchivos';
            axios.get(url, {
                params: {
                    idmilitante: data
                }
            }).then((res) => {
                this.arrayArchivos = res.data.archivos;
            })
        },

        descargarArchivo: function (data) {
            window.open(data, '_blank');
        },
        reset: function () {
            this.tituloModalDetalle = '';
            this.form.id = null;
            this.form.periodo = null,
            this.form.nombres = '';
            this.form.apellidos	= '';
            this.form.correo	= '';
            this.form.estado	= 0;
            this.form.idtipos_documento	= 1;
            this.form.documento	= null;
            this.form.idpais	= 1;
            this.form.iddepartamento	= 0;
            this.form.idciudad	= 0;
            this.form.celular	= '';
            this.form.fechanacimiento	= null;
            this.form.idgenero	= 1;
            this.form.iddepartamenton	= null;
            this.form.idciudadn	= null;
            this.form.viviendocali	= 0;
            this.form.telefono	= '';
            this.form.direccion	= '';
            this.form.barrio	= '';
            this.form.comuna	= 0;
            this.form.anombre	= '';
            this.form.aparentesco	= '';
            this.form.adocumento	= '';
            this.form.acelular	= '';
            this.form.atelefono	= '';
            this.form.foto	= null;
            this.form.certificado	= null;
            this.form.nominaciones= [];

            this.nominaciones.idnominado = 0;
            this.nominaciones.nombre = '';
            this.nominaciones.anio = '';
            this.nominaciones.idmodalidad = 0;
            this.nominaciones.idcategoria = 0;
            this.nominaciones.certificado = null;
            this.nominaciones.oro = 0;
            this.nominaciones.plata = 0;
            this.nominaciones.bronce = 0;
            this.nominaciones.file = null;
            this.estado = '';
        },
        save: function (data) {
            data.fechaingreso = this.dateTimeFull(data.fechaingreso);
            data.fechanacimiento = data.fechanacimiento?this.dateTimeFull(data.fechanacimiento):null;
            data.fecharenuncia = data.fecharenuncia?this.dateTimeFull(data.fecharenuncia):null;
            this.$inertia.post('/militantes', data, {
                onSuccess: (page) => {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'El militante ha sido creado',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    this.reset();
                    this.closeModal();
                    this.getmilitantes('','updated_at');
                    this.editMode = false;
                },
            });

        },
        edit: function (data) {
            this.editMode = true;
            this.newMode = false;
            this.verMode = false;
            this.arrayArchivos = data.archivos;
            this.archivoform.idmilitante =  data['id'];
            this.openModal('actualizar', data);
        },
        ver: function (data) {
            this.verMode = true;
            this.editMode = false;
            this.newMode = false;
            this.arrayArchivos = data.archivos;
            this.archivoform.idmilitante =  data['id'];
            this.openModal('ver', data);
        },

        validarEdad: function(fechanacimiento) {
            var now = moment(new Date()); //todays date
            var end = moment(fechanacimiento); // another date
            var duration = moment.duration(now.diff(end));
            //var days = duration.asDays();
            var anios = duration.asYears();
            if (anios < 18) {
                this.form.acudiente = true;
            }
        },

        onError:function(error){
            console.log('error ?' + error)
        },
        validateDatospersonales: function() {
            console.log('Validando validateDatospersonales');
            let statuserror = true;

            if (this.form.idtipos_documento == '-') {
                this.errors.idtipos_documento = 'Debe ingresar el tipo de documento';
                statuserror =  false;
            } else {
                this.errors.idtipos_documento = null;
            }

            if (this.form.documento === null || this.form.documento == 0 || this.form.documento == '') {
                statuserror =  false;
                this.errors.documento = 'Ingrese el documento de identidad';
            } else {
                this.errors.documento = null;
            }

            if (this.form.nombres === '') {
                statuserror =  false;
                this.errors.nombres = 'Ingrese el nombre';
            } else {
                this.errors.nombres = null;
            }
            if (this.form.apellidos === '') {
                statuserror =  false;
                this.errors.apellidos = 'Ingrese el apellido';
            } else {
                this.errors.apellidos = null;
            }

            if (this.form.iddepartamento == '-') {
                statuserror =  false;
                this.errors.iddepartamento = 'Seleccione un departamento';
            } else {
                this.errors.iddepartamento = null;
            }

            if (this.form.idciudad == '-') {
                statuserror =  false;
                this.errors.idciudad = 'Seleccione la ciudad';
            } else {
                this.errors.idciudad = null;
            }

            if (this.form.fechanacimiento === null) {
                statuserror =  false;
                this.errors.fechanacimiento = 'Ingrese la fecha de nacimiento';
            } else {
                this.errors.fechanacimiento = null;
            }

            if (this.form.idgenero == '-') {
                statuserror =  false;
                this.errors.idgenero = 'Seleccione un género';
            } else {
                this.errors.idgenero = null;
            }
            if (this.form.viviendocali === '' || this.form.viviendocali <= 0) {
                statuserror =  false;
                this.errors.viviendocali = 'Ingrese la cantidad de años viviendo el Cali';
            } else {
                this.errors.viviendocali = null;
            }

            if (!statuserror) {
                Swal.fire({
                    icon: 'error',
                    title: 'Ingrese la información solicitada',
                    showConfirmButton: true,
                })
                return false;
            }

            this.validarEdad(this.form.fechanacimiento);
            return true;
        },
        validateContacto: function() {
            console.log('Validando validateContacto');
            let statuserror = true;
            if (this.form.celular === '' || this.form.celular <= 0) {
                statuserror =  false;
                this.errors.celular = 'Ingrese número celular';
            } else {
                this.errors.celular = null;
            }

            if (this.form.telefono === '') {
                statuserror =  false;
                this.errors.telefono = 'Ingrese número telefono';
            } else {
                this.errors.telefono = null;
            }

            if (this.form.correo === '') {
                statuserror =  false;
                this.errors.correo = 'Ingrese el correo';
            } else {
                this.errors.correo = null;
            }

            if (this.form.direccion === '') {
                statuserror =  false;
                this.errors.direccion = 'Ingrese la direccion';
            } else {
                this.errors.direccion = null;
            }

            if (this.form.barrio === '') {
                statuserror =  false;
                this.errors.barrio = 'Ingrese el barrio';
            } else {
                this.errors.barrio = null;
            }

            if (this.form.comuna <= 0 || this.form.comuna == '') {
                statuserror =  false;
                this.errors.comuna = 'Ingrese la comuna';
            } else {
                this.errors.comuna = null;
            }

            //Acudiente
            if (this.form.acudiente) {
                if (this.form.anombre == '' || this.form.anombre === null) {
                    statuserror =  false;
                    this.errors.anombre = 'Ingrese número nombre';
                } else {
                    this.errors.anombre = null;
                }
                if (this.form.aparentesco == '' || this.form.aparentesco === null) {
                    statuserror =  false;
                    this.errors.aparentesco = 'Ingrese el parentesco';
                } else {
                    this.errors.aparentesco = null;
                }
                if (this.form.aidtipos_documento == '0' || this.form.aidtipos_documento == '-') {
                    statuserror =  false;
                    this.errors.aidtipos_documento = 'Ingrese el tipo de documento';
                } else {
                    this.errors.aidtipos_documento = null;
                }
                if (this.form.adocumento == '' || this.form.adocumento <= 0) {
                    statuserror =  false;
                    this.errors.adocumento = 'Ingrese número de documento';
                } else {
                    this.errors.adocumento = null;
                }
                if (this.form.acelular == '' || this.form.acelular <= 0) {
                    statuserror =  false;
                    this.errors.acelular = 'Ingrese número celular';
                } else {
                    this.errors.acelular = null;
                }
            }

            if (!statuserror) {
                Swal.fire({
                    icon: 'error',
                    title: 'Ingrese la información solicitada',
                    showConfirmButton: true,
                })
                return false;
            }

            if (!this.form.id) {
                console.log('nuevo');

                var formData = new FormData();
                formData.append('nombres', this.form.nombres);
                formData.append('apellidos', this.form.apellidos);
                formData.append('correo', this.form.correo);
                formData.append('estado', this.form.estado);
                formData.append('fechanacimiento', this.dateTimeFull(this.form.fechanacimiento));
                formData.append('barrio', this.form.barrio);
                formData.append('comuna', this.form.comuna);
                formData.append('viviendocali', this.form.viviendocali);
                formData.append('idtipos_documento', this.form.idtipos_documento);
                formData.append('documento', this.form.documento);
                formData.append('direccion', this.form.direccion);
                formData.append('idpais', this.form.idpais);
                formData.append('idgenero', this.form.idgenero);
                formData.append('iddepartamento', this.form.iddepartamento);
                formData.append('idciudad', this.form.idciudad);
                formData.append('telefono', this.form.telefono);
                formData.append('celular', this.form.celular);

                if (this.form.acudiente) {
                    formData.append('anombre', this.form.anombre);
                    formData.append('aparentesco', this.form.aparentesco);
                    formData.append('adocumento', this.form.adocumento);
                    formData.append('aidtipos_documento', this.form.aidtipos_documento);
                    formData.append('acelular', this.form.acelular);
                    formData.append('atelefono', this.form.atelefono);
                }

                /*
                this.$inertia.post('/nominados', formData, {
                    onBefore: (visit) => { console.log('onBefore');},
                    onStart: (visit) => {console.log('onStart');},
                    onProgress: (progress) => {console.log('onProgress');},
                    onSuccess: (page) => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Se realizará la creación del nominado',
                            showConfirmButton: true,
                        })
                    },
                    onError: (errors) => {console.log(errors);},
                    onCancel: () => {console.log('onCancel');},
                    onFinish: visit => {console.log('onFinish');},
                });
                */
                axios.post('/nominados', formData)
                    .then((res) => {
                        /*
                        Swal.fire({
                            icon: 'success',
                            title: 'Se realizará la creación del nominado',
                            showConfirmButton: true,
                        })
                         */
                        this.buscarDocumento(this.form.documento);
                    }).catch(function (error) {
                    console.log(error);
                });

            } else {
                console.log('modificar');
                this.form._method = 'PUT';
                axios.post('/nominados/' + this.form.id, this.form)
                    .then((res) => {
                        /*
                        console.log(res);
                        Swal.fire({
                            icon: 'warning',
                            title: 'Se actualizará el nominado existente',
                            showConfirmButton: true,
                        })
                         */
                    }).catch(function (error) {
                    console.log(error);
                });
            }
            return true;
        },
        validateCheckout:function() {
            console.log('Validando checkout');
            let statuserror = true;

            if (this.nominaciones.idmodalidad == 0) {
                statuserror =  false;
                this.errors.idmodalidad = 'Seleccione la modalidad';
            } else {
                this.errors.idmodalidad = null;
            }

            if (this.nominaciones.idcategoria == 0) {
                statuserror =  false;
                this.errors.idcategoria = 'Seleccione la categoria';
            } else {
                this.errors.idcategoria = null;
            }

            if (this.nominaciones.nombre == '') {
                statuserror =  false;
                this.errors.nombrecompeticion = 'Ingrese el nombre de la competencia o evento';
            } else {
                this.errors.nombrecompeticion = null;
            }

            if (!this.nominaciones.file) {
                statuserror =  false;
                this.errors.file = 'Seleccione un archivo PDF';
            } else {
                this.errors.file = null;
            }

            if (this.nominaciones.oro < 0) {
                statuserror =  false;
                this.errors.oro = 'Ingrese la cantidad';
            } else {
                this.errors.oro = null;
            }
            if (this.nominaciones.plata < 0) {
                statuserror =  false;
                this.errors.plata = 'Ingrese la cantidad';
            } else {
                this.errors.plata = null;
            }
            if (this.nominaciones.bronce < 0) {
                statuserror =  false;
                this.errors.bronce = 'Ingrese la cantidad';
            } else {
                this.errors.bronce = null;
            }

            if (!statuserror) {
                Swal.fire({
                    icon: 'error',
                    title: 'Ingrese la información solicitada',
                    showConfirmButton: true,
                })
                return false;
            }

            this.isOpendatos = true;
        },
        registrarCheckout: function() {
            /*
            if (!this.protecciondatos) {
                Swal.fire({
                    icon: 'error',
                    title: 'Debe aceptar la política de tratamiento de datos personales para continuar',
                    showConfirmButton: true,
                })
                return false;
            }

             */

            this.isOpendatos = false;
            var formData = new FormData();
            formData.append('nombre', this.nominaciones.nombre);
            formData.append('idnominado', this.form.id);
            formData.append('anio', this.nominaciones.anio);
            formData.append('certificado', this.nominaciones.certificado);
            formData.append('idmodalidad', this.nominaciones.idmodalidad );
            formData.append('idcategoria', this.nominaciones.idcategoria);
            formData.append('oro', this.nominaciones.oro);
            formData.append('plata', this.nominaciones.plata);
            formData.append('bronce', this.nominaciones.bronce);
            formData.append('file', this.nominaciones.file);

            /*
                        this.$inertia.post('/nominaciones', formData, {
                            onBefore: (visit) => { console.log('onBefore');},
                            onStart: (visit) => {console.log('onStart');},
                            onProgress: (progress) => {console.log('onProgress');},
                            onSuccess: (page) => {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Se realizó la creación de la nominación',
                                    showConfirmButton: true,
                                })
                            },
                            onError: (errors) => {console.log(errors);},
                            onCancel: () => {console.log('onCancel');},
                            onFinish: visit => {console.log('onFinish');},
                        });
                      */
            axios.post('/nominaciones', formData)
                .then((res) => {
                    Swal.fire({
                        title: "Registro completado",
                        text: "Desea realizar otra nominación?",
                        icon: 'warning',
                        showDenyButton: true,
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Si, Proceder!',
                        denyButtonText: 'Terminar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.nominaciones.nombre = '';
                            this.nominaciones.anio = '';
                            this.nominaciones.idmodalidad = 0 ;
                            this.nominaciones.idcategoria = 0 ;
                            this.nominaciones.certificado = null ;
                            this.nominaciones.oro = 0 ;
                            this.nominaciones.plata = 0 ;
                            this.nominaciones.bronce = 0;
                            this.nominaciones.file = null;
                            this.estado = '';
                            this.form.nominaciones = [];
                            this.buscarDocumento(this.form.documento);
                        } else if (result.isDenied) {
                            this.closeModal();
                            this.form.nominaciones = [];
                        }
                    });
                }).catch(function (error) {
                    console.log(error);
                    this.form.nominaciones = [];
                    return false;
            });

            return true;
        },
        validateRegistro: function() {
            console.log('Validando validateRegistro');
            Swal.fire({
                title: "Registro completado",
                text: "Desea realizar otra nominación?",
                icon: 'warning',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Si, Proceder!',
                denyButtonText: 'Terminar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.nominaciones.nombre = '';
                    this.nominaciones.anio = '';
                    this.nominaciones.idmodalidad = 0 ;
                    this.nominaciones.idcategoria = 0 ;
                    this.nominaciones.certificado = null ;
                    this.nominaciones.file = null ;
                    this.nominaciones.oro = 0 ;
                    this.nominaciones.plata = 0 ;
                    this.nominaciones.bronce = 0;
                } else if (result.isDenied) {
                    this.closeModal();
                }
            });
        },
        handleValidation: function(isValid, tabIndex){
            console.log('Tab: '+tabIndex+ ' valid: '+isValid)
        },
        onChange: function(prevIndex, nextIndex){
            console.log('prevIndex: '+prevIndex+ ' nextIndex: '+nextIndex)
        },
    },
    created: function () {
        this.getModalidades();
        this.getGeneros();
    },
    mounted() {
        //console.log(this.militantes);
    },
}

</script>
<style>

.vueperslide--active {
    box-shadow: 0 0 6px rgba(0, 0, 0, 0.3);
    opacity: 1;
    border-color: #000;
}

.vueperslides__arrow--next{
    right:0;
    left:-3.5em
}
</style>
