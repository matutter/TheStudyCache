#include <cstdlib>
#include <iostream>
#include <ctime>
#include <stdlib.h>

#define seed_offset 101

using namespace std; //one scope


void fill(int ary[][10], int seed);
bool unique(int ary[][10], int num);
void show(int ary[][10]);
void find(int ary[][10], int key);


int main(void)
{
cout << "start" << endl;
int key,seed,ary[10][10];
cout << "Enter a seed to create more variation in the matrix." << endl;
cin >> seed;
cout << "Enter a key to find." << endl;
cin >> key;

fill(ary, seed);
show(ary);
find(ary, key);


return 0;
}


void fill(int ary[][10], int seed)
{
int x,y,num;
//srand(time(NULL)); // more unique


for (y=0;y<10;y++)
	for (x=0;x<10;x++)
		{
			num = (rand()%seed_offset + seed); // everything bigger will have remainder >= seed
			if (unique(ary,num)) ary[x][y] = num; else x--;
		}
return;
}

bool unique(int ary[][10], int num)
{
int x,y; //not passing, want local vars
for (y=0;y<10;y++)
	for (x=0;x<10;x++)
		if (num == ary[x][y])
			return false;

return true;
}


void show(int ary[][10])
{
int x,y;
for (y=0;y<10;y++)
	{
	for (x=0;x<10;x++)
		cout << ary[x][y] << " " ; 
		cout << endl;
	}

return;
}

void find(int ary[][10], int key)
{
int x,y;
for(y=0;y<10;y++)
for(x=0;x<10;x++)
if(key == ary[x][y])
	cout << "Key[" << key << "]@ary[" << x << "][" << y << "]" << endl;


}


