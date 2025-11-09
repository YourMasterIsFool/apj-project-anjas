<script lang="ts" setup>
import AppLayout from '@/layouts/AppLayout.vue';
import MainCard from '@/components/commons/main-card/MainCard.vue';

import FormInput from '@/components/commons/form-input/FormInput.vue'
import { Button } from '@/components/ui/button'
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'


import { useApj } from '../composable/useApj'
import FormSelect from '@/components/commons/form-select/FormSelect.vue';
import AsyncSelect from '@/components/commons/async-select/AsyncSelect.vue';


const {
    onSubmit, form, title, list_jalan,
    jenis,
} = useApj();

</script>
<template>
    <AppLayout>
        <MainCard :title="title">
            <template #main>
                <div class="bg-muted/40 w-full">
                    <Card class="w-full  shadow-sm border border-border/40">
                        <CardHeader>
                            <CardTitle class="text-lg font-semibold">Data Apj</CardTitle>
                        </CardHeader>

                        <CardContent>
                            <form @submit.prevent="onSubmit" class="grid grid-cols-2 gap-4">
                                <!-- Nama Apj -->

                                <div class=" space-y-1">
                                    <!-- <FormInput label="Lokasi Nama Jalan " placeholder="Insert lokasi nama jalan.."
                                        name="lokasi_nama_jalan" :form="form" /> -->

                                    <AsyncSelect :error="form.errors.jalan_id" label="Pilih Jalan"
                                        :value="form.jalan_id"
                                        @update:model-value="(value) => form.jalan_id = Number(value?.value)" :options="list_jalan.map((item) => ({
                                            value: item.id.toString(),
                                            name: item.nama_jalan
                                        }))" />
                                </div>

                                <div class=" space-y-1">
                                    <FormInput label="Kode Tiang" placeholder="Insert Kode Tiang.." name="kode_tiang"
                                        :form="form" />
                                </div>

                                <div class="space-y-1 ">
                                    <FormInput label="Latitude" type="text" placeholder="Insert Latitude"
                                        name="latitude" :form="form" />
                                </div>
                                <!-- Panjang Apj -->
                                <div class="space-y-1 ">
                                    <FormInput type="text" label="Longtitude" placeholder="Insert Longtitude"
                                        name="longitude" :form="form" />
                                </div>
                                <div class="space-y-1 ">
                                    <FormInput type="text" label="Tipe Tiang" placeholder="Insert Tipe Tiang"
                                        name="tipe_tiang" :form="form" />
                                </div>

                                <div class="space-y-1 ">
                                    <FormInput type="number" label="Tahun Pemasangan" placeholder="Tahun Pemasangan"
                                        name="tahun_pemasangan" :form="form" />
                                </div>

                                <div class="space-y-1 ">
                                    <FormInput type="text" label="Lokasi Detail" placeholder="Lokasi Detail"
                                        name="lokasi_detail" :form="form" />
                                </div>

                                <div class="space-y-1 ">
                                    <FormInput type="text" label="Keterangan" placeholder="Keterangan" name="keterangan"
                                        :form="form" />
                                </div>

                                <div class="space-y-1 ">
                                    <FormSelect @on-change="(value) => form.jenis = value" placeholder="Select Jenis"
                                        :value="form.jenis" :options="jenis" label="Jenis" />
                                </div>

                                <!-- Button -->
                                <div class="col-span-2 flex justify-end pt-2">
                                    <Button type="submit" class="px-6" :disabled="form.processing">
                                        {{ form.processing ? 'Menyimpan...' : 'Simpan' }}
                                    </Button>
                                </div>
                            </form>
                        </CardContent>
                    </Card>
                </div>
            </template>
        </MainCard>
    </AppLayout>
    <div>

    </div>
</template>
