import { IGeneralDataEmbed } from '@/types/generalDataEmbed';

export interface GenerateFilterFormProps {
    params: IGenerateForm[];
}

export interface IGenerateForm {
    options?: IGeneralDataEmbed[];
    type: 'select' | 'async-select';
    param_name: string;
    label?: string;
}

export function useFilterGenerateForms({
    params,
    url,
}: {
    params: IGenerateForm[];
    url: string;
}) {
    const onSubmit = () => {
        console.log('onSubmit');
    };
    return {
        params: params,
        url,
        onSubmit,
    };
}
