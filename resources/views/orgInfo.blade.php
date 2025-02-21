@extends('sample')

@section('title')
    Дополнительная информация
@endsection

@section('content')
    <div id="SecondPage">
        <v-app>
            <v-main>
                <v-row>
                    <v-col
                        cols="10"
                    >
                        <b><h4 class="mb-0 mt-3 pl-5 pl-md-10">Подробная информация об организации: {{ $info[0]->name_human }}</h4></b>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col
                        cols="12" md="5"
                    >
                        <v-card class="ml-0 ml-md-4">
                            <v-list dense>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                        cols="5"
                                    >
                                        <v-list-item-content>Код МЭИ организации</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->idlistedu }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                        cols="5"
                                    >
                                    <v-list-item-content>Код МЭИ головной организации</v-list-item-content>
                                    </v-col>
                                        <v-list-item-content class="align-end">
                                        {{ $info[0]->id_parent }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Идентификатор ГИВЦ</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->id_givc }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код организации по Сводному реестру</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->id_rubpnubp }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код уровеня организации</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->id_level }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код типа организации</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->orgtypecode }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код типа учреждения</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->establishmentkindcode }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>ОГРН организации ЕГРЮЛ</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->ogrn }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>ОГРН организации РУБПНУБП</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->ogrn_rub }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код статуса записи в ЕГРЮЛ</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->kod_status_egrul }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Статус записи в ЕГРЮЛ</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->status_egrul }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Дата прекращения деятельности ЕГРЮЛ</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->date_remove }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Дата обновления ЕГРЮЛ</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->egrul_updated }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Номер реестровой записи</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->recordnum_rub }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Дата постановки на учет в ФНС</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->date_start_egrul }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код статуса организации РУБПНУБП</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->kod_status_rub }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код уровня бюджета</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->budgetlvlcode }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                        cols="5"
                                    >
                                    <v-list-item-content>Дата включения организации в Сводный реестр</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->inclusiondate }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                        cols="5"
                                    >
                                    <v-list-item-content>Код ОКОПФ</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->opf_code }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код бюджета</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->budgetcode }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Наименование бюджета</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->budgetname }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код способа образования</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->code_spobul }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Наименование способа образования</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->name_spobul }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Метка о реорганизации</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->is_reorg }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Дата создания организации МОН</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->org_create_date }}
                                    </v-list-item-content>
                                </v-list-item>

                            </v-list>
                        </v-card>
                        <v-card class="ml-0 ml-md-4 mt-8">
                            <v-list dense>
                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Код субъекта</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->id_region }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Наименование субъекта</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->name_region }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Часовой пояс</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->tz }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Адрес</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->address }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Номер телефона организации</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->phone }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Web-сайт</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->site }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>E-Mail</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->mail }}
                                    </v-list-item-content>
                                </v-list-item>
                            </v-list>
                        </v-card>
                    </v-col>
                    <v-col
                        cols="12" md="7"
                    >
                        <v-card class="mx-0 mx-md-2">
                            <v-list dense>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Код учредителя</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->id_spr_min }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Наименование учредителя</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->name_spr_min }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Наименование учредителя ЕГРЮЛ</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->egrul_uchred }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Полное наименование организации ЕГРЮЛ</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->name }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Полное наименование организации РУБПНУБП</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->name_rub }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Сокращенное наименование организации</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->shortname }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Сокращенное наименование организации ЕГРЮЛ</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->name_abb }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Наименование для отчетов</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->name_small }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Наименование для АККСУФ</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->name_human }}
                                    </v-list-item-content>
                                </v-list-item>
                            </v-list>
                        </v-card>
                        <v-card class="mx-0 mx-md-2 mt-8">
                            <v-list dense>
                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>ОКПО / Идентификационный номер ТОСП</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->okpo }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>ИНН организации (ЕГРЮЛ)</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->inn }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>ИНН организации (РУБПНУБП)</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->inn_rub }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>КПП организации (ЕГРЮЛ)</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->kpp }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>КПП организации (РУБПНУБП)</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->kpp_rub }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>ОКВЭД основной</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->okved }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Наименование ОКВЭД основной</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->okvedname }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код ГРБС</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->kbkcode }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>ГРБС</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->kbkname }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код ОКФС</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->okfs }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>ОКФС</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->okfsname }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код территории населенного пункта по ОКТМО</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->oktmo }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Наименование территории населенного пункта по ОКТМО</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->oktmoname }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Код по КОФК территориального органа Федерального казначейства по месту нахождения организации</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->kofkcode }}
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="5"
                                    >
                                        <v-list-item-content>Классификация по деятельности</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        {{ $info[0]->org_type }}
                                    </v-list-item-content>
                                </v-list-item>
                            </v-list>
                        </v-card>
                        <v-card class="mx-0 mx-md-2 mt-8">
                            <v-list dense>
                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>ФИО руководителя организации</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        @php
                                            $heads = json_decode($info[0]->heads, true); // Преобразование JSON-строки в ассоциативный массив
                                        @endphp

                                        @if(isset($heads[0]['fio']))
                                            {{ $heads[0]['fio'] }} <!-- Отображение только значения "fio" -->
                                        @endif
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Должность</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        @if(isset($heads[0]['post']))
                                            {{ $heads[0]['post'] }} <!-- Отображение только значения "fio" -->
                                        @endif
                                    </v-list-item-content>
                                </v-list-item>

                                <v-list-item class="px-0">
                                    <v-col class="py-0 my-0"
                                           cols="4"
                                    >
                                        <v-list-item-content>Документ о назначении</v-list-item-content>
                                    </v-col>
                                    <v-list-item-content class="align-end">
                                        @if(isset($heads[0]['docName']))
                                            {{ $heads[0]['docName'] }} <!-- Отображение только значения "fio" -->
                                        @endif
                                    </v-list-item-content>
                                </v-list-item>
                            </v-list>
                        </v-card>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col
                        cols="12"
                    >
                        <div v-if="{{ $info[0]->idlistedu }} == {{ $info[0]->id_parent }}">

                                @if(!empty($info_branches))
                                    <v-list>
                                        <v-subheader><h5>Филиалы организации:</h5></v-subheader>
                                        @foreach($info_branches as $data)
                                            <v-list-item :href="'../org/{{$data->idlistedu}}'"
                                            >
                                                <i class="mr-2 mdi mdi-chevron-right"></i> {{$data->name}}
                                            </v-list-item>
                                       @endforeach
                                    </v-list>
                                @endif
                                @if(empty($info_branches))
                                    <v-card>
                                        Филиалов нет
                                    </v-card>
                                @endif
                        </div>
                    </v-col>
                </v-row>
            </v-main>
        </v-app>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
        new Vue({
            el: '#SecondPage',
            vuetify: new Vuetify(),
            data() {
                return {
                    branches_name: [1,2,3,4]
                }
            },
            methods: {
                ///
            },
            mounted: function () {
            },
        })
    </script>
@endsection
