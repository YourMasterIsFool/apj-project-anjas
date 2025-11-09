import { IGeneralDataEmbed } from '@/types/generalDataEmbed';

export interface FormSelectProps<T> {
    options: IGeneralDataEmbed[];
    defaultValue?: IGeneralDataEmbed;
    label?: string;
    optionLabel?: (value: T) => string;
    optionValue?: (value: T) => string;
    value: number | T;
    error?: string;
    placeholder?: string;
}
