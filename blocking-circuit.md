# ブロッキング回路の原理
回路図のベクトルの向きはすべて上向きにしました。また、記号法を使いたいところですが、今回は正弦波交流回路ではないため、使うことができません。
## モデルの定義
下図のように各点での電圧値および電流値を考える。
<img src="https://electronic-handicraft.work/wordpress/wp-content/uploads/2021/07/ブロッキング回路図1.png" width=80%>

自己インダクタンス\\(L\_1, L\_2\\)の2つのコイルは巻数比１、結合係数\\(k=1\\)の理想トランスであり、
$$ L\_1=L\_2=L $$
である。また、トランジスタ\\(T\_r\\)は直流電流増幅率\\(h\_{FE}\\)、C-E間飽和電圧\\(V\_{CE(SAT)}\\)、B-E間順方向電圧\\(V\_{BE}\\)の3つの独立な定数のみで定義する。

上記の回路図から、次式が導かれる。
\begin{cases}
V\_{cc}&=&v\_{L1}(t)+v\_1(t)\tag{*} \\\\
V\_{cc}&=&v\_{L2}(t)+v\_2(t) \\\\
\end{cases}
また、図中の2つのコイルは差動的結合だから、
$$ v\_{L1}(t)=-v\_{L2}(t) $$
よって
\begin{eqnarray}
v\_2(t)&=&V\_{cc}-v\_{L2}(t) \notag \\\\
&=&V\_{cc}+v\_{L1}(t) \notag \\\\
&=&V\_{cc}+V\_{cc}-v\_1(t) \notag \\\\
&=&2V\_{cc}-v\_1(t)\\\\
\end{eqnarray}

## コイルの相対極性とトランジスタのスイッチング

コイルの端子にある丸印は実はとても重要です。これはコイルの巻き始め（別に巻き終わりでもいい）を表しており、つまりコイルの相対的な極性を表現しています。上の回路において、電流の向きで言いますと、コイルL1の丸印端子に電流が入り込む場合、コイルL2の丸印から流れ出る方向に電流が流れます。つまりトランジスタがオンしてコイルL2に流れる電流が増大すると、コイルL2から、トランジスタを更に強くオンさせる方向にベース電流が流れるのです。逆の方向の場合は、この逆の作用となります。これによりブロッキング発振回路では下図の2つの明確な動作ステージ（状態）を持ち、またそのステージの急遽な切替（スイッチング動作）を可能としています。

## 動作波形の動作ステージ

定常発振状態時での各電圧、電流波形はこんな感じになるはず。

## \\(T\_r= \textrm{ON} \\)  期間（充電プロセス）を考える
\\(T\_r= \textrm{ON} \\)  期間（\\(T\_1\\)期間）を考える。

コイルの基本式より
$$I\_C=\frac{1}{L} \int\_{0}^{T\_1} v\_{L1}(t) dt$$
また、
$$v\_{L1}(t)=V\_{cc}-V\_{CE(SAT)}$$
であり時間によらず一定値であるので
\begin{eqnarray}
I\_C&=&\frac{1}{L} \int\_{0}^{T\_1} (V\_{cc}-v\_{CE(SAT)})dt \notag \\\\
&=&\frac{V\_{cc}-V\_{CE(SAT)}}{L}\int\_{0}^{T\_1} dt \notag \\\\
&=&\frac{V\_{cc}-V\_{CE(SAT)}}{L}\cdot T\_1
\end{eqnarray}
となる。

次に電磁誘導（トランス結合）によりコイル\\(L\_2\\)に起電する電圧\\(v\_{L2}(t)\\)は\\(v\_{L1}(t)\\)と逆相なので、
\begin{equation}
v\_{L2}(t)=-(V\_{cc}-V\_{CE(SAT)})
\end{equation}
\\(T\_r\\)のベースに流れ入る電流\\(I\_b\\)は
$$I\_b=\frac{V\_{cc}-v\_{L2}(t)-V\_{be}}{R\_b}$$
4,5より
$$I\_b=\frac{2V\_{cc}-V\_{CE(SAT)}-V\_{be}}{R\_b} \label{Ib}$$
\\(T\_r\\)の特性より
$$I\_c=h\_{FE}\cdot I\_b \label{Ic}$$
上記ではコイルの立場からコイルに蓄えられる電流値Icを考えましたが、

次にトランジスタTrの都合からの電流値Icの限界を考えます。
\\[\because \begin{cases}
T\_rが{\small \textrm{ON}}時であり\\\\
V\_{CE(SAT)}\ll \textrm{LED} \\ の順方向電圧なので\\\\
R\_Cに流れる電流は無視できる。
\end{cases} \\]

\eqref{Ib},\eqref{Ic}より
$$I\_c=h\_{FE}\cdot \frac{2V\_{cc}-V\_{CE(SAT)}-V\_{be}}{R\_b}$$
また、
\begin{cases}
V\_{CE(SAT)}=0\\\\
V\_{BE}=0
\end{cases}
とした場合は
$$I\_c=h\_{FE}\cdot \frac{2V\_{CC}}{R\_b}$$
となる。
次に\\(T\_1\\)を求める。
$$T\_1=h\_{FE}\cdot\frac{L}{R\_b} \cdot \frac{2V\_{cc}-V\_{CE(SAT)}-V\_{BE}}{V\_CC-V\_{CE(SAT)}}$$
また、
\begin{cases}
V\_{CE(SAT)}=0\\\\
V\_{BE}=0
\end{cases}
とした場合は、
$$T\_1=h\_{FE}\cdot \frac{2L}{R\_b}$$
となる。
このようにコイルに蓄積出来る有限電流値\\(I\_C\\)および有限時間\\(T\_1\\)が生成される。

## \\(T\_r= \textrm{OFF} \\)  期間（ \\(T\_2\\)期間）
\\(T\_r= \textrm{ON} \\)  期間（\\(T\_1\\)期間）にてコイルにチャージした電流\\(I\_C\\)を抵抗\\(R\_C\\)及び(LED)に供給する期間。
つまり\\(T\_r= \textrm{OFF} \\)になった瞬間からのかと応答を考えればよく、ラプラス演算子sを用いたウラ回路で表現する（s領域で考える）。
\\(T\_r= \textrm{OFF} \\)となったときを時間原点\\(t=0\\)とし、コイルは電流出力なので、過渡応答に無関係な（定常な）LED順方向電圧は無視できる（0（ショート）と考える）。

\begin{eqnarray}
\because s L\_1 // R\_C &=& \frac{1}{\frac{1}{s L\_1}+\frac{1}{R\_C}} \notag \\\\
&=& \frac{s L\_1 \cdot R\_C}{s L\_1 + R\_C} \notag \\\\
v\_{L1}(s) &=& \frac{I\_c}{s} \cdot (s L\_1 // R\_C) \notag \\\\
&=& \frac{I\_c}{s} \cdot \frac{s L\_1 \cdot R\_C}{s L\_1 + R\_C} \notag \\\\
&=& I\_c \cdot R\_C \cdot \frac{L\_1}{s L\_1 + R\_C} \notag \\\\
&=& I\_c \cdot R\_C \cdot \frac{1}{s + \frac{R\_C}{L\_1}} \label{vl1s}
\end{eqnarray}

\\( \eqref{vl1s} \\)を逆ラプラス変換して時間領域に戻すと
$$ v\_{L1}(t)=I\_c \cdot R\_C \cdot e^{-\frac{R\_C}{L\_1}t} \label{vl1t} $$
となる。
$$ \because \frac{1}{s+ \alpha} \leftrightharpoons e^{-\alpha t} $$
となる。
\begin{eqnarray}
v\_{L1(MAX)} &=& I\_c \cdot R\_C \notag \\\\
&=& h\_{FE} \cdot (2V\_{CC}-V\_{CE(SAT)}-V\_{BE}) \cdot \frac{R\_C}{R\_b} \\\\
\end{eqnarray}

\begin{cases}
V\_{CE(SAT)}=0\\\\
v\_{CE(SAT)}=0\\\\
V\_{BE}=0
\end{cases}
とすると、
$$ v\_{L1(MAX)} \simeq 2 \cdot h\_{FE} \cdot V\_{CC} \cdot \frac{R\_C}{R\_b} $$

次に電磁誘導（トランス結合）によってコイル\\(L\_2\\)に誘起する電圧 \\(v\_{L2}(t)\\) と \\(v\_{2}(t)\\) を考える。
トランス結合条件により、向き（極性）に注意して、
$$ v\_{L2}(t)=v\_{L1}(t) \label{vl2t} $$
また、
$$ v\_{2}(t)=V\_{CC}-v\_{L2}(t) \label{v2t} $$
\\( \eqref{vl2t}, \eqref{v2t} \\)と\\( \eqref{vl1t} \\)より、
$$ v\_{2}(t)=V\_{CC}-I\_c \cdot R\_C \cdot e^{-\frac{R\_C}{L\_1}t} $$
となる。

ただし、\\(L_1\\)に流れる電流\\( \ \gg L_2\\)に流れる電流と考えて、\\(L_2\\)から\\(L_1\\)への影響（誘導）は無視している。


さて\\(T_r\\)がオンする条件は概ね\\( v_{2}(t) \gg V_{BE}\\)と考えると、
$$ v_{2}(t) = V_{BE} $$
上式より
\\[I_C \cdot R_c e^{-\frac{R_c}{L}t_2}=V_{CC}-V_{BE}\\]
\\(t_2\\)を求めると
\\[t_2=\frac{L}{R_c}ln\{\frac{I_C \cdot R_c}{V_{CC}-V_{BE}}\}\\]
\begin{eqnarray} \because \begin{cases}
e^{-\frac{R_c}{L}t_2}&=&\frac{V_{CC}-V_{BE}}{I_C \cdot R_c}\\\\
e^{-\frac{R_c}{L}t_2}&=&\frac{I_C \cdot R_c}{V_{CC}-V_{BE}}\\\\
\frac{R_c}{L}t_2&=&ln(\frac{I_C \cdot R_c}{V_{CC}-V_{BE}})\\\\
t_2 &=& \frac{L}{R_c}ln(\frac{I_C \cdot R_c}{V_{CC}-V_{BE}})\\\\
 \end{cases} \end{eqnarray}
よって
\\[T_2=\frac{L}{R_c}ln(h_{FE}\cdot \frac{R_c}{R_b}\cdot \frac{2V_{CC}-V_{CE(SAT)}-V_{BE}}{V_{CC}-V_{BE}})\\]
において
\begin{cases}
V_{CE(SAT)}=0\\\\
V_{BE}=0
\end{cases}
と考えると
\\[T_2=\frac{L}{R_c}ln(2\cdot h_{FE}\cdot \frac{R_c}{R_b})\\]
となる。


このように有限のオフ期間\\(T_2\\)が生成されます。そして再びオン期間（充電プロセス）に移行し、この交代をひたすら繰り返します。これがブロッキング発振回路のメカニズムです。最後に発振周期（発振周波数）を導出しておきます。
発振周期\\(T\\)は
\\[T=T_1+T_2\\]
よって
\\[T=h_{FE}\cdot \frac{L}{R_b}\cdot \frac{2V_{CC}-V_{CE(SAT)}-V_{BE}}{V_{CC}-V_{BE}}+\frac{L}{R_c}ln(h_{FE}\cdot \frac{R_c}{R_b}\cdot \frac{2V_{CC}-V_{CE(SAT)}-V_{BE}}{V_{CC}-V_{CE(SAT)}})\\]
である。
また
\begin{cases}
V_{CE(SAT)}=0\\\\
V_{BE}=0
\end{cases}
とみなした場合は
\\[T=2h_{FE}\cdot \frac{L}{R_b}+\frac{L}{R_c}ln(2h_{FE}\cdot \frac{R_c}{R_b})\\]
となる。

発振周波数\\(f=\frac{1}{T}\\)である。