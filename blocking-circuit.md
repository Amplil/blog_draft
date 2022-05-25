# ブロッキング回路の原理
## モデルの定義
下図のように各点での電圧値および電流値を考えます（回路図のベクトルの向きはすべて上向きにしました。また、記号法を使いたいところですが、今回は正弦波交流回路ではないため、使うことができません。）。
![](https://res.cloudinary.com/ideatech/image/upload/v1650407237/%E3%83%96%E3%83%AD%E3%83%83%E3%82%AD%E3%83%B3%E3%82%B0%E7%99%BA%E6%8C%AF%E5%9B%9E%E8%B7%AF_%E9%9B%BB%E6%B5%81%E3%81%82%E3%82%8A_uhr5jw.png)

ここで、自己インダクタンス\(L_1, L_2\)の2つのコイルは理想トランスであり、巻数比を\(n:1\)、結合係数を\(k\)とすると、トランスの条件式は、
$$
\begin{cases}
L_1=L_2=L \\
n=1 \\
k=1
\end{cases}
$$
であるとします。また、トランジスタ\(T\_r\)は直流電流増幅率\(h\_{FE}\)、C-E間飽和電圧\(V\_{CE(SAT)}\)、B-E間順方向電圧\(V\_{BE}\)の3つの独立な定数のみで定義します。
## ブロッキング回路のポイント
### コイルの相対極性
コイルの端子にある丸印はコイルの巻き始め（別に巻き終わりでもいい）を表しており、つまりコイルの相対的な極性を表現しています。

上の回路図では、自己インダクタンス\(L\_1, L\_2\)の2つのコイルが、相互インダクタンス\(M\)で、差動的に結合しているので、\( v\_{L1}(t),v\_{L2}(t) \)は、
\begin{cases}
v\_{L1}(t)&=&L\_1 \frac{di\_{L1}(t)}{dt}-M \frac{di\_{L2}(t)}{dt} \\
v\_{L2}(t)&=&L\_2 \frac{di\_{L2}(t)}{dt}-M \frac{di\_{L1}(t)}{dt} \\
\end{cases}
ここで\(M\)と\(L\_1, L\_2\)の関係は、
$$ M=k \sqrt{L\_1 L\_2} $$
\eqref{trans-condition}の条件式から、
$$ M=L $$
となるので、
\begin{cases}
v\_{L1}(t)&=&L \frac{di\_{L1}(t)}{dt}-L \frac{di\_{L2}(t)}{dt} \\
v\_{L2}(t)&=&L \frac{di\_{L2}(t)}{dt}-L \frac{di\_{L1}(t)}{dt}\\
\end{cases}
よって、
$$ v\_{L1}(t)=-v\_{L2}(t) \label{vl1vl2}$$
が成り立ちます。すなわち、理想トランスの場合、2つのコイルの電圧は互いに逆相であるということです（巻数比が1:1でない場合も式の中に\(n\)が入りますが逆相の関係となります。\( v\_{L1}(t),v\_{L2}(t) \) のどちらかのベクトルを逆向きにとると、同相ということになりますが、これは差動的結合の表記を無視した式になります）。また、今回の場合、正弦波交流回路でないため、この逆相の関係は電流に対しては成り立ちません（1次側で直流電流が流れていても、2次側で誘導起電力が発生しないことからも成り立たないことがわかります）。
たとえば、コイルL2の丸印から流れ出る方向に電流が流れた場合、\(T\_r\)にベース電流が流れるため、\(T\_r\)がONとなり、コイルL1の丸印端子に電流が入り込む方向に電流が流れますが、これは全く逆相でない動きです。
### コイルの充電とトランジスタの特性
\(T\_r \)がオンである間、\(T\_r \)のコレクタに接続されたコイルL1に電流が流れる訳ですが、コイルの特性から電流は積分値となります。この場合は定電圧印加なので直線的にコイル電流が増えて行く（コイルに充電されて行く）ことになります。コイルはずっとこの調子で電流を増やして行きたいのですが、トランジスタ\(T\_r \)の都合でそうは行かなくなるのです。それはベース電流にトランジスタ固有の電流増幅率\(h\_{FE} \)を掛け算した値以上のコレクタ電流を流すことが出来ないというトランジスタの根本的特性から来る都合なのです。
次にトランスの基本特性を考えます。トランスは電磁誘導作用により1次コイルL1から2次コイルＬ２にエネルギーを伝達する訳ですが、電磁誘導は磁束の変化がなければ作用しません。つまりコイルL1の電流変化（電流の増大）が止まれば、上のグラフからも分かるようにコイルL2の起電圧は無くなります。これにより有限時間の充電プロセスが生成されるわけです。
このようにトランジスタの特性とコイル（トランス）の特性とのコラボレーションにより生成される有限時間の充電プロセスと何らかの放電プロセスを繰り返すことによりブロッキング発振回路が成立しています。これがブロッキング発振回路の動作を理解する上ではとても重要なことです。

## 式の導出
ここからは回路方程式から\(v\_2(t)\)の式を導いたあと、\(T\_r= \textrm{ON} \)  期間（充電プロセス）と\(T\_r= \textrm{OFF} \)  期間（放電プロセス）に分けて考えていきます。
### 回路方程式

上の回路図から、次式が導かれる。
\begin{cases}
V\_{CC}&=&v\_{L1}(t)+v\_1(t) \\
V\_{CC}&=&v\_{L2}(t)+v\_2(t) \\
\end{cases}
よって
\begin{eqnarray}
v\_2(t)&=&V\_{CC}-v\_{L2}(t) \notag \\
&=&V\_{CC}+v\_{L1}(t) \label{v2t<-v1t} \\
&=&V\_{CC}+V\_{CC}-v\_1(t) \notag \\
&=&2V\_{CC}-v\_1(t)\\
\end{eqnarray}

### \(T\_r= \textrm{ON} \)  期間（充電プロセス）
\(T\_r= \textrm{ON} \)  期間（\(T\_1\)期間）において、はじめにコイルに蓄えられる電流値\(I\_c\)を考える。

コイルの基本式より
$$I\_c=\frac{1}{L} \int\_{0}^{T\_1} v\_{L1}(t) dt$$
また、
$$v\_{L1}(t)=V\_{CC}-V\_{CE(SAT)}\label{vl1thalf}$$
であり、時間によらず一定値であるので、
\begin{eqnarray}
I\_c&=&\frac{1}{L} \int\_{0}^{T\_1} (V\_{CC}-v\_{CE(SAT)})dt \notag \\
&=&\frac{V\_{CC}-V\_{CE(SAT)}}{L}\int\_{0}^{T\_1} dt \notag \\
&=&\frac{V\_{CC}-V\_{CE(SAT)}}{L}\cdot T\_1 \label{iccoil}
\end{eqnarray}
となる。

次にトランジスタ\(T\_r\)からみた電流値の限界である\(I\_c\)は、

\eqref{vl1vl2},\eqref{vl1thalf}式より、
\begin{equation}
v\_{L2}(t)=-(V\_{CC}-V\_{CE(SAT)}) \label{vl2t}
\end{equation}
\(T\_r\)のベースに流れる電流\(I\_b\)は
$$I\_b=\frac{V\_{CC}-v\_{L2}(t)-V\_{be}}{R\_b} $$
だから、\eqref{vl2t}式を代入して、
$$I\_b=\frac{2V\_{CC}-V\_{CE(SAT)}-V\_{be}}{R\_b} \label{Ib}$$
\(T\_r\)が\({\small \textrm{ON}}\)時であり、
\(V\_{CE(SAT)}\ll \textrm{LED} \)の順方向電圧なので、\(R\_c\)に流れる電流は無視できるため、\(T\_r\)の特性より、
$$I\_c=h\_{FE}\cdot I\_b \label{Ic}$$


\eqref{Ib},\eqref{Ic}式より
$$I\_c=h\_{FE}\cdot \frac{2V\_{CC}-V\_{CE(SAT)}-V\_{be}}{R\_b} \label{ictr} $$

よって \eqref{iccoil}, \eqref{ictr}式から、\(T\_1\)は、
$$T\_1=h\_{FE}\cdot\frac{L}{R\_b} \cdot \frac{2V\_{CC}-V\_{CE(SAT)}-V\_{BE}}{V\_{CC}-V\_{CE(SAT)}}$$
また、


\begin{cases}
V\_{CE(SAT)} \simeq 0 \label{approximation} \\
V\_{BE} \simeq 0
\end{cases}
と近似した場合、

\eqref{ictr}式から、
$$I\_c \simeq h\_{FE}\cdot \frac{2V\_{CC}}{R\_b}$$
\eqref{t1}式から、
$$T\_1 \simeq h\_{FE}\cdot \frac{2L}{R\_b} \label{t1}$$
となる。
このようにコイルに蓄積出来る有限電流値\(I\_c\)および有限時間\(T\_1\)が生成される。

### \(T\_r= \textrm{OFF} \)  期間（放電プロセス）
\(T\_r= \textrm{ON} \)  期間（\(T\_1\)期間）にてコイルにチャージした電流\(I\_c\)を抵抗\(R\_c\)及び(LED)に供給する期間を考える。
つまり\(T\_r= \textrm{OFF} \)になった瞬間からのかと応答を考えればよく、ラプラス演算子sを用いたウラ回路で表現する（s領域で考える）。
\(T\_r= \textrm{OFF} \)となったときを時間原点\(t=0\)とし、コイルは電流出力なので、過渡応答に無関係な（定常な）LED順方向電圧は無視できる（0（ショート）と考える）。

$$ s L\_1 // R\_c = \frac{1}{\frac{1}{s L\_1}+\frac{1}{R\_c}}=\frac{s L\_1 \cdot R\_c}{s L\_1 + R\_c} $$
だから、
\begin{eqnarray}
v\_{L1}(s) &=& \frac{I\_c}{s} \cdot (s L\_1 // R\_c) \notag \\
&=& \frac{I\_c}{s} \cdot \frac{s L\_1 \cdot R\_c}{s L\_1 + R\_c} \notag \\
&=& I\_c \cdot R\_c \cdot \frac{L\_1}{s L\_1 + R\_c} \notag \\
&=& I\_c \cdot R\_c \cdot \frac{1}{s + \frac{R\_c}{L\_1}} \label{vl1s}
\end{eqnarray}
ここで、
$$ \frac{1}{s+ \alpha} \leftrightharpoons e^{-\alpha t} $$
だから、
\eqref{vl1s}式を逆ラプラス変換して時間領域に戻すと
$$ v\_{L1}(t)=I\_c \cdot R\_c \cdot e^{-\frac{R\_c}{L\_1}t} \label{vl1t} $$
となる。
\begin{eqnarray}
v\_{L1(MAX)} &=& I\_c \cdot R\_c \notag \\
&=& h\_{FE} \cdot (2V\_{CC}-V\_{CE(SAT)}-V\_{BE}) \cdot \frac{R\_c}{R\_b} \\
\end{eqnarray}

\eqref{approximation}式の近似を用いると、
$$ v\_{L1(MAX)} \simeq 2 h\_{FE} \cdot V\_{CC} \cdot \frac{R\_c}{R\_b} $$

次に電磁誘導（トランス結合）によってコイル\(L\_2\)に誘起する電圧 \(v\_{L2}(t)\) と \(v\_{2}(t)\) を考える。

\eqref{v2t<-v1t}式に\eqref{vl1t}式を代入して、
$$ v\_{2}(t)=V\_{CC}-I\_c \cdot R\_c \cdot e^{-\frac{R\_c}{L\_1}t} $$
となる。

ただし、\(L_1\)に流れる電流\( \ \gg L_2\)に流れる電流と考えて、\(L_2\)から\(L_1\)への影響（誘導）は無視している。


さて\(T\_r\)がオンする条件は概ね\( v\_{2}(t) \gg V\_{BE}\)と考えると、
$$ v\_{2}(t) = V\_{BE} $$
上式より
\[I\_c \cdot R\_c e^{-\frac{R\_c}{L}t\_2}=V\_{CC}-V\_{BE}\]
\(t\_2\)を求めると
\begin{eqnarray}
e^{-\frac{R\_c}{L}t\_2}&=&\frac{V\_{CC}-V\_{BE}}{I\_c \cdot R\_c} \notag\\
e^{\frac{R\_c}{L}t\_2}&=&\frac{I\_c \cdot R\_c}{V\_{CC}-V\_{BE}} \notag\\
\frac{R\_c}{L} \cdot t\_2&=&ln(\frac{I\_c \cdot R\_c}{V\_{CC}-V\_{BE}}) \notag\\
t\_2 &=& \frac{L}{R\_c}ln(\frac{I\_c \cdot R\_c}{V\_{CC}-V\_{BE}})
\end{eqnarray}
よって
\[T\_2=\frac{L}{R\_c}ln(h\_{FE}\cdot \frac{R\_c}{R\_b}\cdot \frac{2V\_{CC}-V\_{CE(SAT)}-V\_{BE}}{V\_{CC}-V\_{BE}})\]
\eqref{approximation}式の近似を用いると、
\[T\_2\simeq \frac{L}{R\_c}ln(2\cdot h\_{FE}\cdot \frac{R\_c}{R\_b})\]
となる。

最後に発振周期\(T\)を求める。
\[T=T\_1+T\_2\]
だから
\begin{eqnarray}
T=h\_{FE}\cdot \frac{L}{R\_b}\cdot \frac{2V\_{CC}-V\_{CE(SAT)}-V\_{BE}}{V\_{CC}-V\_{BE}} \notag \\
+\frac{L}{R\_c}ln(h\_{FE}\cdot \frac{R\_c}{R\_b}\cdot \frac{2V\_{CC}-V\_{CE(SAT)}-V\_{BE}}{V\_{CC}-V\_{CE(SAT)}})
\end{eqnarray}
である。
また、\eqref{approximation}式の近似を用いると、
\[T \simeq 2h\_{FE}\cdot \frac{L}{R\_b}+\frac{L}{R\_c}ln(2h\_{FE}\cdot \frac{R\_c}{R\_b})\]
である。