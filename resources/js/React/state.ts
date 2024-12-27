import { atom, selector } from 'recoil';
import dayjs, { Dayjs } from 'dayjs';
import { StorageConstant } from '@/React/shared/define/storage.constant';
import { IUser } from '@/React/shared/interfaces/user.interface';
import { setStorageByKey } from '@/React/shared/utils/storage';

export const userState = atom<IUser | undefined>({
  key: StorageConstant.USER,
  default: undefined,
  effects: [
    ({ onSet }) => {
      onSet((newUser) => {
        setStorageByKey(StorageConstant.USER, newUser);
      });
    }
  ]
});

export const searchDataState = atom<{
  checkin_date: Dayjs;
  checkout_date: Dayjs;
  max_adults: number;
  max_children: number;
}>({
  key: 'searchDataState',
  default: {
    checkin_date: dayjs().add(2, 'day').add(7, 'hour'),
    checkout_date: dayjs().add(3, 'day').add(7, 'hour'),
    max_adults: 2,
    max_children: 0
  }
});

export const roomsState = atom<any[]>({
  key: 'roomsState',
  default: undefined
});

export const tokenSelectorState = selector<{ JwtToken?: string; RefreshToken?: string } | undefined>({
  key: 'tokenSelector',
  get: ({ get }) => {
    const user = get(userState);

    return { JwtToken: user?.JwtToken, RefreshToken: user?.RefreshToken };
  }
});

export const loadingState = atom<boolean>({
  key: 'loadingState',
  default: false
});
