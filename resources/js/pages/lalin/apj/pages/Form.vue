<script lang="ts" setup>
import AppLayout from '@/layouts/AppLayout.vue';
import MainCard from '@/components/commons/main-card/MainCard.vue';

import FormInput from '@/components/commons/form-input/FormInput.vue'
import { Button } from '@/components/ui/button'
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card'

import { useApj } from '../composable/useApj'
import FormSelect from '@/components/commons/form-select/FormSelect.vue';

const {
    onSubmit, form, title,
    jenis
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

                                <div class="col-span-2 space-y-1">
                                    <FormInput label="Lokasi Nama Jalan " placeholder="Insert lokasi nama jalan.."
                                        name="lokasi_nama_jalan" :form="form" />
                                </div>

                                <div class="col-span-2 space-y-1">
                                    <FormInput label="Kode Tiang" placeholder="Insert Kode Tiang.." name="kode_tiang"
                                        :form="form" />
                                </div>

                                <div class="space-y-1 col-span-2">
                                    <FormInput label="Latitude" type="number" placeholder="Insert Latitude"
                                        name="latitude" :form="form" />
                                </div>
                                <!-- Panjang Apj -->
                                <div class="space-y-1 col-span-2">
                                    <FormInput type="number" label="Longtitude" placeholder="Insert Longtitude"
                                        name="longitude" :form="form" />
                                </div>
                                <div class="space-y-1 col-span-2">
                                    <FormInput type="text" label="Tipe Tiang" placeholder="Insert Tipe Tiang"
                                        name="tipe_tiang" :form="form" />
                                </div>

                                <div class="space-y-1 col-span-2">
                                    <FormInput type="number" label="Tahun Pemasangnan" placeholder="Tahun Pemasangnan"
                                        name="tahun_pemasangan" :form="form" />
                                </div>

                                <div class="space-y-1 col-span-2">
                                    <FormInput type="text" label="Lokasi Detail" placeholder="Lokasi Detail"
                                        name="lokasi_detail" :form="form" />
                                </div>

                                <div class="space-y-1 col-span-2">
                                    <FormInput type="text" label="Keterangan" placeholder="Keterangan" name="keterangan"
                                        :form="form" />
                                </div>

                                <div class="space-y-1 col-span-2">
                                    <FormSelect @on-change="(value) => form.jenis = value" placeholder="Select Jenis"
                                        :value="form.jenis" :options="jenis" label="Jenis" />
                                </div>

                                {{ form.jenis }}

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
