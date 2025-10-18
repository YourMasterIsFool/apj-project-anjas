import { IGeneralDataEmbed } from '@/types/generalDataEmbed';

export interface IFormInterface<T = IGeneralDataEmbed> {
    label?: string;
    placeholder?: string;
    value?: T;
}
