import { userState } from '@/React/state';
import { RecoilState, RecoilValueReadOnly } from 'recoil';
import { setRecoil } from 'recoil-nexus';
import { StorageConstant } from '@/React/shared/define/storage.constant';

export const mappingStorageRecoil = async () => {
  try {
    const keysMapping: Array<{
      keyStorage: string;
      state: RecoilState<any>;
    }> = [
      {
        keyStorage: StorageConstant.USER,
        state: userState as RecoilState<any>
      }
    ];
    for (let i = 0; i < keysMapping.length; i++) {
      const dataStorage = getStorageByKey(keysMapping[i].keyStorage);
      if (dataStorage) {
        setRecoil(keysMapping[i].state, dataStorage);
      }
    }
  } catch (error) {
    console.log(error);
    return;
  }
};

export const setStorageByKey = (key: string, value: any) => {
  try {
    localStorage.setItem(key, JSON.stringify(value));
  } catch (error) {
    console.error(`Error setting storage key ${key}: ${error}`);
  }
};

export const getStorageByKey = (key: string) => {
  try {
    const storedValue = localStorage.getItem(key);
    if (storedValue) {
      return JSON.parse(storedValue);
    } else {
      return null;
    }
  } catch (error) {
    console.error(`Error getting storage key ${key}: ${error}`);
    return null;
  }
};
